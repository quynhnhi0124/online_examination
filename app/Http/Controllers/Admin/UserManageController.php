<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class UserManageController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return view('auth.admin.user-manage')->with('users', $users);
    }

    public function viewEdit($id){
        $users = DB::table('users')
                ->where('id',$id)
                ->get();
        return view('auth.admin.edit-user')->with('users',$users)->with('id',$id);

    }

    public function editInfo(Request $request, $id){
        // $id = Auth::id();
        $users = DB::table('users')
                ->where('id',$id)
                ->get();
        $firstname = $request['edit-firstname'];
        $lastname = $request['edit-lastname'];
        $email = $request['edit-email'];
        $role = $request['edit-role'];
        $status = $request['edit-status'];
        $edit = User::where('id',$id)
                ->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'role' => $role,
                    'status' => $status,
                ]);
        // return view('auth.admin.user-manage')->with('status',"Update successfully!");
        return redirect()->to('/admin/user-manage');
    }
}
