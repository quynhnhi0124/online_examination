<?php

namespace App\Http\Controllers\Auth;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use DB;
// use Auth;
use App\User;
use App\Repositories\Repository;

class UserManageController extends Controller
{
    private $repository;

    public function __construct(Repository $repository) 
    {
        $this->repository = $repository;
    }

    public function viewEdit($id)
    {
        $user = Repository::getUser()->find($id);
        return view('auth.edit-user', ['user'=>$user]);
    }

    public function editInfo($id, Request $request)
    {
        $input = $request->only([
            'firstname',
            'lastname',
            'email',
            'mobile',
           ]);
        Repository::getUser()->update($id, $input);
        return redirect()->route('home');
    }

    public function find($id)
    {
        
    }
    public function delete($id)
    {

    }
}
