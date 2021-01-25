<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Repositories\Repository;


class AdminController extends Controller
{
    
    private $repository;

    public function __construct(Repository $repository) 
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    
    public function viewUser(){
        $pagination = Repository::getUser()->paginate(2);
        $users = Repository::getUser()->get();
        $role = DB::table('roles')
                            ->join('users','roles.role_num','=','users.role')
                            ->select('roles.role','roles.role_num')->distinct('roles.role')->get();
        return view('auth.admin.user-manage', ['users'=>$users,'role'=>$role, 'pagination'=>$pagination]);
    }

    public function editUser($id, Request $request){
        $input = $request->only([
            'role',
            'status',
        ]);
        Repository::getUser()->update($id, $input);
        return redirect()->route('admin.user-manage.user-manage');
    }
}
