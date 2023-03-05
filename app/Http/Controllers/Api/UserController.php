<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\user\PasswordRequest;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Image;
use App\Models\TableOrder;

class UserController extends BaseController
{
    public function me(Request $request){
        $user = User::find(Auth::id());
      
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
                
                $url = $this->uploadFile($request,"avatar/",64,64);
    
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
                    DB::table('users')->where('id',Auth::id())->update(["phone" =>$request->phone]);
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

            return $this->sendResponse( DB::table('table_users')->get(),"Updated profile user successfully!!");


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

    public function fetchNewOrder(Request $request){
        try{

            $dataFetch = TableOrder::where('user_id',Auth::id())->get();
            return $this->sendResponse($dataFetch,"Fetch new order successfully!!");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }
}
