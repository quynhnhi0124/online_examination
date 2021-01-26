<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function get()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {    
        $username = $request->get('username');
        $password = $request->get('password');
        if (Auth::attempt(['username' => $username, 'password' => $password,'status'=>1])){
            return redirect()->route('admin.user-manage.user-manage');
        } else {
            dd('user got banned');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
