<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use Validator;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Helpers\Helper;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        //try {
            Mail::raw('Hello you! A user created an account with the name: '.$data['firstname'].' '.$data['lastname'].'    and email: '.$data['email'], function ($message) {
                $message->from('hello@digitalmonkey.com', 'DigitalMonkey');
                $message->to(env('MY_MAIL'))->subject('Somebody created an account!');
            });
        //} catch (\Exception $e) {}
        return User::create([
            'fullname' => $data['firstname'].' '.$data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToFacebookOAUTH() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function facebookCallbackLogin() {
        $user_fb = Socialite::driver('facebook')->user();
        $results = User::where('fb_id', $user_fb->getId())->get();;
        if (count($results) == 0) {
            
            //$user->token;
            //$user_fb->getAvatar();
            
            $user = User::create([
                'fullname' => $user_fb->getName(),
                'fb_id' => $user_fb->getId(),
                'email' => $user_fb->getEmail()
            ]);
            $user->save();
            
        } else {
            $user = $results[0];
        }
        auth()->login($user);
        return redirect()->to(Helper::env_url('/'));
        
    }
}
