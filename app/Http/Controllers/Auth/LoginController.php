<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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

    use AuthenticatesUsers;
    //use ThrottlesLogins;

    protected $maxAttempts=2;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = /*RouteServiceProvider::HOME*/ 'buy';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authentication.login');
    }

    /*public function login(LoginRequest $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)){
            return $this->sendSuccessResponse();
        }
        return $this->sendFailedLoginResponse();
        //return redirect()->route('homepage2');
    }

    protected function sendSuccessResponse(){
        session()->regenerate();
        return redirect()->intended();
    }

    protected function sendFailedLoginResponse()
    {
        return back()->with('loginFailed',true);
    }

    public function attemptLogin(Request $request)
    {
        return Auth::attempt($request->only('email','password'),$request->filled('remember'));
    }*/

    public function logout(){
        session()->invalidate();
        \Auth::logout();
        return redirect()->route('homepage2');
    }

    protected function username(){
        return 'email';
    }
}
