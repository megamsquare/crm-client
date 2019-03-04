<?php

namespace App\Http\Middleware;

use Closure;
//use Auth;

class IsLoginMiddleware
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
        if(!$request->session()->has('headertoken')){
            return redirect('/login');
        }
        return $next($request);
    }
}
