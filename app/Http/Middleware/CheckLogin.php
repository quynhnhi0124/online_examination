<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckLogin
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
        if(Auth::check() && auth()->user()->status == 1){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
