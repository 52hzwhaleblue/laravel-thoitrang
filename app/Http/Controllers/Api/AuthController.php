<?php

namespace App\Http\Controllers\Api;

use App\Models\TableUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;

class AuthController extends BaseController
{

    public function login(Request $request){

            $validateTableUser = Validator::make($request->all(),
            [
                'phone' => 'required',
                'password' => 'required'
            ]);

            if($validateTableUser->fails()){
                return $this->sendError('validation error',$validateTableUser->errors(),401);
            }

            if(!Auth::attempt($request->only(['phone', 'password']))){
                return $this->sendError('Phone & Password does not match with our record.',"",201);
            }

            $tableUser = User::where('phone',$request->phone)->first();

            $token = $tableUser->createToken('auth-login'.$tableUser->id, ['expires_at' => now()])->plainTextToken;

            return $this->sendResponse($token,'user Logged In Successfully');


    }

    public function logout(Request $request){
        try {
            $request->user()->currentAccessToken()->delete();

            return $this->sendResponse([],"Logout success!!");

        } catch (\Throwable $th) {

            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function register(Request $request,DB $db)
    {     
        try {
            $validateTableUser = Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'image' => 'nullable',
            ]);

            if($validateTableUser->fails()){
                return $this->sendError('validation error',$validateTableUser->errors(),401);
            }
            $query = $db::table('table_users');
            
            $checkEmaiAndPhone = $query
            ->where('email', $request->email)
            ->exists();

            if(!$checkEmaiAndPhone){
                $url = "";
                
                if($request->hasFile('image')){
                    $url = $this->uploadFile($request,"avatars/",250,250);
                }
                
                $query->insert([
                    "username" => "username@" .Str::random(6),
                    "fullname" => $request->fullname,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "password" => Hash::make($request->password),
                    "photo" => $url,
                    "created_at" => now(),
                ]);
                return $this->sendResponse([],'User Sign Up Successfully');
            }else{
                return $this->sendResponse([],'Email already exists');
            }
           

        } catch (\Throwable $th) {

            return $this->sendError( $th->getMessage(),500);

        }
    }

    public function checkPhone(){
        try{
            $phone = request()->input('phone');

            $ischeck = User::where('phone',$phone)->exists();
           
            if(!$ischeck){
                return $this->sendResponse([201],"Failed");
            }
            return $this->sendResponse([200],"Successfully");

        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function forgotPassword(){
        try{
            $phone = request()->input('phone');

            $newpass = request()->input('new_password');

            User::where('phone',$phone)->update([
                "password" => Hash::make($newpass),
            ]);
  
            return $this->sendResponse(200,"Change password successfully");

        }catch(\Throwable $th){
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function loginWithGoogle(Request $request){

        try {
            $query_user =  User::where('email',$request->email);

            //check the account already in database
            $checkEmail =  $query_user->exists();

            if($checkEmail){
                $TableUser = $query_user->first();

                $token = $TableUser->createToken('auth-login'.$TableUser->id, ['expires_at' => now()])->plainTextToken;

                return $this->sendResponse($token,'User Logged In Successfully');
            }

            $validateTableUser = Validator::make($request->all(),
            [
                'fullname' => 'required',
                'email' => 'required',
            ]);

            if($validateTableUser->fails()){
                return $this->sendError('validation error',$validateTableUser->errors(),401);
            }

            $TableUser = User::create([
                "username" => "username@" .Str::random(6),
                "fullName" => $request->fullname,
                "email" => $request->email,
                "login_provider" => "google",
            ]);

            $token = $TableUser->createToken('auth-login-google'.$TableUser->id, ['expires_at' => now()])->plainTextToken;

            return $this->sendResponse($token,'TableUser Logged In Successfully');

        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }

}

