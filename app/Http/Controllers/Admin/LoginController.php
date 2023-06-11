<?php
namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
    * Where to redirect admins after login.
    *
    * @var string
    */
    protected $redirectTo = '/admin';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function showLoginView()
    {
        return view('admin.template.auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            if(!Auth::guard('admin')->attempt($request->only(['email', 'password']))){
                return redirect()->route('admin.show_login_view')->with('warning','Email & Password không tồn tại trong hệ thống.');
            }

            $admin = Admin::where('email',$email)->first();
            $token = $admin->createToken('auth-login-admin'.$admin->id, ['expires_at' => now()])->plainTextToken;

            return redirect()->route('admin.index');
        }catch (\Throwable $e){
            return redirect()->route('admin.show_login_view');
        }
    }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);
    //     if (Auth::guard('admin')->attempt([
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ], $request->get('remember'))) {
    //     return redirect()->intended(route('admin.index'));
    // }
    //     return back()->withInput($request->only('email', 'remember'));
    // }




    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
//        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}

