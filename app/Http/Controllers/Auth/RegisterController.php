<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Repository;
class RegisterController extends Controller 
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Repository $repository)
    {
        $this->middleware('guest');
        $this->repository = $repository;
    }

    public function get()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(RegisterRequest $request)
    {
        $validated = $request -> validated();
        $input = $request->only([
            'firstname',
            'lastname',
            'username',
            'email',
            'password',
            'mobile',
        ]);
        Repository::getUser()->create($input);
        return redirect()->route('welcome');
    }
}
