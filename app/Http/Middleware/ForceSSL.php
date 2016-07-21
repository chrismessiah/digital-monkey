<?php

namespace App\Http\Middleware;

use Closure;

class ForceSSL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ( (env('FORCE_SSL') === true) && ($request->header('x-forwarded-proto') != 'https') && (env('APP_ENV') === 'production') ) {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}
