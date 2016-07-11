<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'fb_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function getFirstname() {
        return explode(" ",$this->fullname)[0];
    }
    
    public function getPicUrl() {
        if ($this->fb_id) {
            return('https://graph.facebook.com/v2.6/'.$this->fb_id.'/picture?width=500');
        }
        if (file_exists(asset('images/profile_pics/'.$this->id.'.jpg'))) {
            return(asset('images/profile_pics/'.$this->id.'.jpg'));
        }
        return(asset('images/profile_pics/example.jpg'));
    }
}
