<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
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
        $this->middleware('guest');
    }
    
    public function facebookRegister($user_fb) {
        //$user->token;
        //$user_fb->getAvatar();
        $user = User::create([
            'fullname' => $user_fb->getName(),
            'fb_id' => $user_fb->getId(),
            'email' => $user_fb->getEmail()
        ]);
        $user->save();
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
         try {
             Mail::raw('Hello you! A user created an account with the name: '.$data['firstname'].' '.$data['lastname'].'    and email: '.$data['email'], function ($message) {
                 $message->from('hello@digitalmonkey.com', 'DigitalMonkey');
                 $message->to(env('MY_MAIL'))->subject('Somebody created an account!');
             });
         } catch (\Exception $e) {}
         return User::create([
             'fullname' => $data['firstname'].' '.$data['lastname'],
             'email' => $data['email'],
             'password' => bcrypt($data['password']),
         ]);
     }
}
