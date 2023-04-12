<?php

namespace App\Http\Controllers\Api;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Image;
use App\Models\Order;
use App\Models\TableChat;
use App\Models\TableOrder;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\user\PasswordRequest;
use App\Http\Controllers\Api\BaseController as BaseController;

class UserController extends BaseController
{
    public function me(){
        $user = DB::table('table_users')->find(Auth::id());
      
        return $this->sendResponse($user,"Get success!!");
    }

    public function editProfile(EditRequest $request, DB $db){
        try{
            $validateUser = Validator::make($request->all(),$request->rules());
          
           /* This is a validation error. */
            if($validateUser->fails()){
                return $this->sendError('validation error',$validateUser->errors(),401);
            }
            $query =  $db::table('table_users')->where('id',Auth::id());
            if ($request->has('image')) {
                              
                $imagePath = $query->first()->photo;
           
                Storage::disk('public')->delete($imagePath);
               
                $path = $this->uploadFile($request,"avatars/",150,150);
                
                $query->update(["photo" => $path]);
            }

            if(!empty($request->fullname)){
                $query->update(["fullName" =>$request->fullname]);
            }

            if(!empty($request->phone)){
                $phoneExist = $db::table('table_users')->where('phone',$request->phone)->exists();
                if($phoneExist){
                    return $this->sendError('Phone error',"The phone already exists",201);
                }else{
                    $query->update(["phone" =>$request->phone]);
                }
             
            }

            if(!empty($request->email)){
                $emailExist =  $db::table('table_users')->where('email',$request->email)->exists();
                if($emailExist){
                    return $this->sendError('email error',"Email already exists",201);
                }else{
                    $query->update(["email" =>$request->email]);
                }
            }

            if(!empty($request->username)){
                $query->update(["username" =>$request->username]);
            }

            return $this->sendResponse( $query->first(),"Updated profile user successfully!!");


        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function changePassword(PasswordRequest $request){
        try{
            $validateData = Validator::make($request->all(),$request->rules());
    
           /* This is a validation error. */
            if($validateData->fails()){
                return $this->sendError('validation error',$validateData->errors(),401);
            }
         
            if(!Hash::check($request->current_password, Auth::user()->password)){
                return $this->sendResponse([],"Current password incorrect!,Please try again!!");
            }

            DB::table('table_users')->where('id',Auth::user()->id)->update(["password" => Hash::make($request->new_password)]);

            return $this->sendResponse([],"Changed password user successfully!!");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function fetchOrder(){
        try{

            $dataFetch = TableOrder::where('user_id',Auth::id())->get();
            return $this->sendResponse($dataFetch,"Fetch order successfully!!");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function createChat(Request $request, DB $db){
    try {
        $chatMessage = $request->input('message');
        $room_chat_id_request = $request->input('room_chat_id');
        $admin = $db::table('table_users')->where('role', 0)->first();
        $userId = Auth::id();
       
        $db::transaction(function () use ($db, $userId, $chatMessage, $room_chat_id_request, $admin) {
            if (is_null($room_chat_id_request)) {
                $room_chat_id = $db::table('table_room_chats')->insertGetId([
                    "user_id" => $userId,
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
                $db::table('table_chats')->insert([
                    "room_chat_id" => $room_chat_id,
                    "sender_id" => $userId,
                    "receiver_id" => $admin->id,
                    "message" => $chatMessage,
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
            } else {
                $db::table('table_chats')->insert([
                    "room_chat_id" => $room_chat_id_request,
                    "receiver_id" => $admin->id,
                    "sender_id" => $userId,
                    "message" => $chatMessage,
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
            }
        });

        return $this->sendResponse([], "Chat successfully");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), null, 500);
        }
    }

    public function fetchChat(DB $db){
        try{          
            $room_chat = $db::table('table_room_chats')->where('user_id',Auth::id())->first();

            if(empty($room_chat)){    

                return $this->sendResponse([] ,"Fetch chat successfully");
            }

            $chats = $db::table('table_chats')
            ->where('room_chat_id', $room_chat->id)
            ->get();

            return $this->sendResponse($chats,"Fetch chat successfully");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }


    public function testChat(Request $request){
        try{
            $chatMessage = $request->input('message');

            $room_chat_id_request = $request->input('room_chat_id');

            $user_id = $request->input('user_id');

            $chats = [
                "room_chat_id" => (int) $room_chat_id_request,
                "receiver_id" => (int)$user_id,
                "sender_id" => 2,
                "message" =>$chatMessage,
                "created_at" => date('Y-m-d H:i:s') ,
                "updated_at" =>date('Y-m-d H:i:s') ,
            ];   

            $this->pusher('room-chat-user-'.$user_id, 'chat-message',  $chats);
            
            return $this->sendResponse([],"Chat successfully");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function updateStatusOrder(DB $db){
        try{
            $userId = Auth::id();

            $orderId = (int)request()->input('order_id');

            $query = $db::table("table_orders")->find($orderId);

            $currentStatus =(int) request()->input('current_status');

            $title = "";

            $body = "";

            if( $currentStatus == 1){
                $title = "Đơn hàng ".$query->code.' đã được xác nhận';
                $body = "Chú ý theo dõi trạng thái đơn hàng để được giao đúng thời gian";
            }

            if( $currentStatus == 2){
                $title = "Đơn hàng".$query->code.' đang được vận chuyển';
                $body = "Chú ý theo dõi trạng thái đơn hàng để được giao đúng thời gian";
            }
            

            $this->sendNotiToUser($userId,$title,$body,null,"order");



        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),null,500);
        }
    }
}
