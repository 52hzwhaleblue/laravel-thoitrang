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

    public function register(Request $request)
    {
        
        try {
            $validateTableUser = Validator::make($request->all(), 
            [
                'username' => 'required',
                'fullname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'image' => 'required',
            ]);

            if($validateTableUser->fails()){
                return $this->sendError('validation error',$validateTableUser->errors(),401);
            }
            
            $checkEmaiAndPhone = DB::table('table_users')
            ->where('phone', $request->phone)
            ->orWhere('email', $request->email)
            ->exists();

            if(!$checkEmaiAndPhone){
                $url = $this->uploadFile($request,"avatar/",85,85);
                
                DB::table('table_users')->insert([
                    "username" => $request->TableUsername,
                    "fullname" => $request->fullname,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "password" => Hash::make($request->password),
                    "photo" => $url,
                ]);
            }else{
                return $this->sendResponse([],'Email or phone are already exists');

            }
            return $this->sendResponse([],'User Sign Up Successfully');

        } catch (\Throwable $th) {    

            return $this->sendError( $th->getMessage(),500);

        }
    }

    
    public function loginWithGoogle(Request $request){

        try {
            //check the account already in database
            $checkEmail =  DB::table('table_users')->where('email',$request->email)->exists();

            if($checkEmail){
                $TableUser = User::where('email',$request->email)->first();

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
            ]);
            
            $token = $TableUser->createToken('auth-login-google'.$TableUser->id, ['expires_at' => now()])->plainTextToken;

            return $this->sendResponse($token,'TableUser Logged In Successfully');
            
        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),500);
        }
    }

}
