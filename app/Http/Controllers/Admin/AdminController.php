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
        $pagination = Repository::getUser()->paginate(2);
        $users = Repository::getUser()->get();
        return view('auth.admin.user-manage', ['users'=>$users, 'pagination'=>$pagination]);
    }

    public function editUser($id, Request $request)
    {
        $input = $request->only([
            'role',
            'status',
        ]);
        Repository::getUser()->update($id, $input);
        return redirect()->route('admin.user-manage.user-manage');
    }
}
