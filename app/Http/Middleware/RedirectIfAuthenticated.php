<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == 0 || $role == 1){
                return redirect()->route('admin.user-manage.user-manage');
            }else{
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
