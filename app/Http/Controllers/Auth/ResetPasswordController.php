<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // use ResetsPasswords;

    public function getChange($id)
    {
        return view('auth.passwords.change-password');
    }

    public function changePassword($id, ResetPasswordRequest $request)
    {
        if(Hash::check($request["current-password"], Auth::user()->password)){
            $input = [
                'password'=>$request["password"],
            ];
            Repository::getUser()->update($id, $input);
            return redirect()->back()->with('notification', 'success');    
        } 
        else{
            return redirect()->back()->with('notification', 'danger');    
        }
    }
}
