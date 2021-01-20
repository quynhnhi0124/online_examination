<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    /*
     * Phương thức này trả về view dùng để đăng nhập cho admin
     * */
    public function login(){
        return view('admin.auth.login');
    }

    /*
     * Phương thức này dùng để đăng nhập cho admin
     * Lấy thông tin từ form có method là post
     * */
    public function loginAdmin(LoginRequest $request){
        $validated = $request->validated();
        if (Auth::guard('admin')->attempt([
            'email' => $request -> email,
            'password' => $request -> password,
        ],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }
        else{
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }

    /*
     * Phương thức này dùng để đăng xuất
     * */
    public function logout()
    {
        Auth::guard('admin')->logout();

        // chuyển hướng về trang login của admin
        return redirect()->route('admin.auth.login');
    }

}
