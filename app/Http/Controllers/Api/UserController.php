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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\user\PasswordRequest;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableRoomChat;
use App\Http\Controllers\Api\XMPPConnectionManager;

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

                if(!empty($imagePath)){

                    Storage::disk('public')->delete($imagePath);
                   
                }

                $path = $this->uploadFile($request,"avatars/",1920,1028);
                    
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

    public function updateStatusOrder(DB $db){
        try{
            $userId = Auth::id();

            $orderId = (int)request()->input('order_id');

            $query = $db::table("table_orders")->find($orderId);

            $title = "";

            $body = "";

            if( $query->status == 1){
                $title = "Đơn hàng ".$query->code.' đã được xác nhận';
                $body = "Chú ý theo dõi trạng thái đơn hàng để được giao đúng thời gian";
            }

            if($query->status == 2){
                $title = "Đơn hàng".$query->code.' đang được vận chuyển';
                $body = "Chú ý theo dõi trạng thái đơn hàng để được giao đúng thời gian";
            }
            

            $this->sendNotiToUser($userId,$title,$body,null,"order");



        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),null,500);
        }
    }
}
