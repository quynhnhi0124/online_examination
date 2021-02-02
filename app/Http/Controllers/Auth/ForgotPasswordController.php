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
        $username = Repository::getUser()->findBy('email',$email)->first();
        if($username){
            $request['token'] = StringHelper::generateUnique();
            $item = $request->only([
                'email',
                'token',
            ]);
            Repository::getPassword()->create($item);
            Mail::to($email)->send(new ForgotPassword($request['token']));
            $alert = "Một đường link thay đổi mật khẩu đã được gửi đến email của bạn!";
            return redirect()->back()->with('alert',$alert);
        }
        else
        {
            $alert = "Không tìm thấy email";
            return redirect()->back()->with('alert',$alert);
        }
    }

    public function getReset($token, Request $request)
    {
        $data = Repository::getPassword()->findBy('token',$token)->first();
        if($data)
        {
            if(Carbon::parse($data->updated_at)->addMinutes(5)->isPast())
            {
                $data->delete();
                $msg = "Quá thời gian!";
                return view('auth.passwords.reset',['msg'=>$msg]);
            }
            return view('auth.passwords.reset', ['token' =>$token]);
        }
        $msg =  "Không tìm thấy";
        return view('auth.passwords.reset',['msg'=>$msg]);

    }

    public function resetPassword($token, Request $request)
    {
        $data = Repository::getPassword()->findBy('token',$token)->first();
        $user = Repository::getUser()->findBy('email',$data->email)->first();
        $input = $request->only([
            'password'
        ]);
        Repository::getUser()->update($user->id, $input);
        $data->delete();
        $msg = "Thành công!";
        return view('auth.passwords.reset', ['msg'=>$msg,'token'=>$token]);
    }
}
