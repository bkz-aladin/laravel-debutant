<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session('auth') == true){
            //Auth is okay
            return $next($request);
        }
        else{
            //Auth is wrong
            return redirect('/login')->with('error', 'Retry ');
        }
    }
}
