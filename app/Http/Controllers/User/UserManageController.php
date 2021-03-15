<?php

namespace App\Http\Controllers\User;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Repositories\Repository;
use App\Requests\EditUserRequest;

class UserManageController extends Controller
{
    public function viewEdit($id)
    {
        $user = Repository::getUser()->find($id);
        return view('auth.edit-user', ['user'=>$user]);
    }

    public function editInfo($id, EditUserRequest $request)
    {
        $input = $request->only([
            'firstname',
            'lastname',
            'email',
            'mobile',
           ]);
        $update = Repository::getUser()->update($id, $input);
        if($update){
            return redirect()->back()->with('edit_info', 'success');
        }else return redirect()->back()->with('edit_info', 'danger');
    }
}
