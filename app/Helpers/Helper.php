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
        if ($path[0] == "/") {
            return env('WEB_DOMAIN').$path;
        }
        return env('WEB_DOMAIN')."/".$path;
    }
}
