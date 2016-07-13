<?php

namespace App\Helpers;

// call in blade with
//      {{ Helper::env_url(); }}
//
// OR in controller with
//      use App\Helpers\Helper;
//      ...
//      Helper::env_url();

class Helper {
    public static function env_url($path) {
        if (env('APP_ENV') == 'local') {
            return url($path);
        }
        return secure_url($path);
    }
    
    public static function env_asset($path) {
        if (env('APP_ENV') == 'local') {
            return asset($path);
        }
        return secure_asset($path);
    }
}
