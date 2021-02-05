<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Repositories\Repository;


class AdminController extends Controller
{
    public function viewUser()
    {
        $users = Repository::getUser()->paginate(5);
        return view('admin.user-manage', ['users'=>$users]);
    }

    public function editUser($id, Request $request)
    {
        $input = $request->only([
            'role',
            'status',
        ]);
        Repository::getUser()->update($id, $input);
        return redirect()->route('user-manage.user-manage');
    }
}
