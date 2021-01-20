<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Model\AdminModel;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin')->only('index');
    }
    public function index(){
        return view('admin.dashboard');
    }
    public function create(){
        return view('admin.auth.register');
    }
    public function store(RegisterRequest $request){
        $validated = $request->validated();
        $admin = AdminModel::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('admin.auth.login');

    }

}
