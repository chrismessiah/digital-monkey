<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Mail;
use Validator;

use App\User;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';
    
    
    public function redirectToFacebookOAUTH() {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function facebookCallbackLogin() {
        $user_fb = Socialite::driver('facebook')->user();
        $results = User::where('fb_id', $user_fb->getId())->get();;
        if (count($results) == 0) {
            // REGISTER account
            $user = app('App\Http\Controllers\Auth\RegisterController')->facebookRegister($user_fb);
        } else {
            // already have account, log in
            $user = $results[0];
        }
        auth()->login($user);
        return redirect()->to(Helper::env_url('/'));  
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
