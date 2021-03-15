<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Carbon\Carbon;
use App\ResetPasswordModel;
use Illuminate\Http\Request;
use App\Mail\ForgotPassword;
use App\Helpers\StringHelper;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function index()
    {
        return view('auth.passwords.forgot-password');
    }

    public function getNewPassword(Request $request)
    {
        $email = $request->email;
        $username = Repository::getUser()->findBy('email', $email)->first();
        if($username){
            $request['token'] = StringHelper::generateUnique(); //helper sinh token duy nhat
            $item = $request->only([
                'email',
                'token',
            ]);
            Repository::getPassword()->create($item);
            Mail::to($email)->send(new ForgotPassword($request['token']));
            return redirect()->back()->with('new_password', 'success');
        }
        else
        {
            return redirect()->back()->with('new_password', 'danger');
        }
    }

    public function getReset($token, Request $request)
    {
        $data = Repository::getPassword()->findBy('token', $token)->first();
        if($data && $data->active == 1)
        {
            if(Carbon::parse($data->created_at)->diffInMinutes(now()) > 24*60)
            {
                $deactive = [
                    "active"=>0,
                ]; 
                Repository::getPassword()->update($data->id, $deactive);
                $msg = "Quá thời gian!";
                return view('auth.passwords.reset', ['msg'=>$msg]);
            }
            return view('auth.passwords.reset', ['token' =>$token]);
        }
        return view('404-page');

    }

    public function resetPassword($token, ResetPasswordRequest $request)
    {
        $data = Repository::getPassword()->findBy('token', $token)->first();
        if($data && $data->active == 1){
            if(Carbon::parse($data->created_at)->diffInMinutes(now()) > 24*60) {
                return view('404-page');
            }
            $user = Repository::getUser()->findBy('email', $data->email)->first();
            $input = $request->only([
                'password'
            ]);
            Repository::getUser()->update($user->id, $input);
            $deactive = [
                "active"=>0,
            ]; 
            Repository::getPassword()->update($data->id, $deactive);
            $msg = "Thành công!";
            return view('auth.passwords.reset', ['msg'=>$msg, 'token'=>$token]);
        }
        return view('404-page');

    }
}
