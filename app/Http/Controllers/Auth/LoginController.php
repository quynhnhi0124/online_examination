<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



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
        } 
        elseif(Auth::attempt(['username' => $username, 'password' => $password,'status'=>0])){
            return redirect()->back()->with('login_message','secondary');
        }
        else {
            return redirect()->back()->with('login_message','danger');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
