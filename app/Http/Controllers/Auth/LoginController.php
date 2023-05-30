<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    // use AuthenticatesUsers;
    // change to ->
    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

     public function login(Request $request)
     {
         $this->validate($request, [
             'email' => 'required|email',
             'password' => 'required|min:6'
         ]);
         $credentials = $request->only(['email', 'password']);
         if (Auth::attempt($credentials)) {
//             dd('user');
             return redirect()->route('index');
//            return redirect()->intended(route('index'));
        }
//         return back()->withInput($request->only('email', 'remember'));
     }

    public function logout(Request $request)
    {
//        $this->performLogout($request);
//        return redirect()->route('index');
        Auth::logout();
        return redirect()->route('login');
    }
}
