<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\SubjectModel;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;


class SubjectController extends Controller
{
    public function createSubject(Request $request)
    {
        $subject = $request->only([
            'subject',
        ]);
        Repository::getSubject()->create($subject);
        return redirect()->route('admin.user-manage.user-manage');
    }

    public function indexSubject($id)
    {
        $subject_category = Repository::getSubject()->joinWhere('subject_category','subject_category.subject_id','subjects.id','subject_category.subject_id',$id);
        return view('subject.index', ['subject_category'=>$subject_category]);
    }

    public function category($id)
    {
        $subject_category = Repository::getSubject()->joinWhere('subject_category','subject_category.subject_id','subjects.id','subject_category.subject_id',$id);
        return view('subject.category.create', ['subject_category'=>$subject_category]);
    }

    public function createCategory($id, Request $request)
    {
        $subject_category = Repository::getSubject()->joinWhere('subject_category','subject_category.subject_id','subjects.id','subject_category.subject_id',$id);
        $request['subject_id'] = $subject_category[0]->subject_id;
        $category = $request->only([
            'subject_id',
            'subject_category',
        ]);
        Repository::getCategory()->create($category);
        $message = "Thêm mới chủ đề thành công";
        return redirect()->back()->with('message',$message);
    }

    public function deleteCategory($id)
    {
        Repository::getCategory()->delete($id);
        $message = "Xóa chủ đề";
        return redirect()->back()->with('message',$message);
    }
}