<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Auth;
use Validator;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(UserLoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        if (Auth::attempt(['email' => $email, 'password' => $password, 'confirmed' => config('common.user.confirmed.is_confirm')], $request->has('remember'))) {          
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(trans('message.login_error'));
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
