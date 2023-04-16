<?php

namespace App\Http\Controllers\Api;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Image;
use App\Models\Order;
use App\Models\TableOrder;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\user\PasswordRequest;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableChat;

class UserController extends BaseController
{
    public function me(Request $request){
        $user = DB::table('table_users')->find(Auth::id());
      
        return $this->sendResponse($user,"Get success!!");
    }

    public function editProfile(EditRequest $request){
        try{
            $validateUser = Validator::make($request->all(),$request->rules());
    
           /* This is a validation error. */
            if($validateUser->fails()){
                return $this->sendError('validation error',$validateUser->errors(),401);
            }

            if ($request->has('image')) {
                
                $url = $this->uploadFile($request,"avatar/",85,85);
    
                DB::table('table_users')->where('id',Auth::id())->update(["photo" => $url]);
            }

            if(!empty($request->fullname)){
               DB::table('table_users')->where('id',Auth::id())->update(["fullName" =>$request->fullname]);
            }

            if(!empty($request->phone)){
                $phoneExist = DB::table('table_users')->where('phone',$request->phone)->exists();
                if($phoneExist){
                    return $this->sendError('Phone error',"The phone already exists",201);
                }else{
                    DB::table('table_users')->where('id',Auth::id())->update(["phone" =>$request->phone]);
                }
             
            }

            if(!empty($request->email)){
                $emailExist = DB::table('table_users')->where('email',$request->email)->exists();
                if($emailExist){
                    return $this->sendError('email error',"Email already exists",201);
                }else{
                    DB::table('table_users')->where('id',Auth::id())->update(["email" =>$request->email]);
                }
            }

            if(!empty($request->username)){
               DB::table('table_users')->where('id',Auth::id())->update(["username" =>$request->username]);
            }

            return $this->sendResponse( DB::table('table_users')->where('id',Auth::id())->first(),"Updated profile user successfully!!");


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

    public function fetchOrder(Request $request){
        try{

            $dataFetch = TableOrder::where('user_id',Auth::id())->get();
            return $this->sendResponse($dataFetch,"Fetch order successfully!!");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function createChat(Request $request){
        try{
            $chatMessage = $request->input('message');

            $room_chat_id_request = $request->input('room_chat_id');

            $admin = DB::table('table_users')->where('role',0)->first();

            if(empty($room_chat_id_request)){
                $room_chat_id =  DB::table('table_room_chats')->insertGetId([
                    "user_id" => Auth::id(),
                    "created_at" => date('Y-m-d H:i:s') ,
                    "updated_at" =>date('Y-m-d H:i:s') ,
                ]);

                DB::table('table_chats')->insert([
                    "room_chat_id" => $room_chat_id,
                    "sender_id" => Auth::id(),
                    "receiver_id" => $admin->id,
                    "message" =>$chatMessage ,
                    "created_at" => date('Y-m-d H:i:s') ,
                    "updated_at" =>date('Y-m-d H:i:s') ,
                ]);

                return $this->sendResponse([],"Chat successfully");
            }

            DB::table('table_chats')->insert([
                "room_chat_id" => $room_chat_id_request,
                "receiver_id" => $admin->id,
                "sender_id" => Auth::id(),
                "message" =>$chatMessage,
                "created_at" => date('Y-m-d H:i:s') ,
                "updated_at" =>date('Y-m-d H:i:s') ,
            ]);                
            return $this->sendResponse([],"Chat successfully");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function fetchChat(Request $request){
        try{          
            $room_chat = DB::table('table_room_chats')->where('user_id',Auth::id())->first();

            if(empty($room_chat)){    

                return $this->sendResponse([] ,"Fetch chat successfully");
            }

            $chats = DB::table('table_chats')
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
}
