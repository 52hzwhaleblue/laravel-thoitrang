<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            if(!Auth::attempt($request->only(['email', 'password']))){
                return redirect()->route('admin.show_login_view')->with('warning','Email & Password không tồn tại trong hệ thống.');
            }

            $user = User::where('email',$email)->first();

            if($user->role ==1){
                return redirect()->route('admin.show_login_view')->with('warning','Bạn không đủ quyền truy cập.');
            }
            $token = $user->createToken('auth-login-admin'.$user->id, ['expires_at' => now()])->plainTextToken;
            return redirect()->route('admin.index');
        }catch (\Throwable $e){
            return redirect()->route('admin.show_login_view');
        }
    }

    public function showLoginView()
    {
        return view('admin.template.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.show_login_view')->with('message', 'Bạn đã đăng xuất thành công.');
    }
}

