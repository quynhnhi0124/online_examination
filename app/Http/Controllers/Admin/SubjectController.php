<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\SubjectModel;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\CreateCategoryRequest;


class SubjectController extends Controller
{
    public function createSubject(CreateSubjectRequest $request)
    {
        $subject = $request->only([
            'subject',
        ]);
        Repository::getSubject()->create($subject);
        return redirect()->route('admin.user-manage.user-manage');
    }

    public function indexSubject($id)
    {
        $subject_category = Repository::getSubject()->joinWhere('subject_category','subject_category.subject_id','subjects.id','subject_category.subject_id',$id)->paginate(5);
        $exams = Repository::getSubject()->joinWhere('exams','exams.subject_id','subjects.id','exams.subject_id',$id)->paginate(10);
        return view('subject.index', ['subject_category'=>$subject_category, 'exams'=>$exams, 'id'=>$id]);
    }

    public function category($id)
    {
        $subject = Repository::getSubject()->findBy('id',$id)->first();
        return view('subject.category.create', ['subject_category'=>$subject, 's'=>$id]);
    }

    public function createCategory($id, CreateCategoryRequest $request)
    {
        $subject = Repository::getSubject()->findBy('id', $id)->first();
        $request['subject_id'] = $subject->id;
        $category = $request->only([
            'subject_id',
            'subject_category',
        ]);
        $create = Repository::getCategory()->create($category);
        if($create){
            return redirect()->route('admin.subject.index-subject', [$id])->with('create_message', 'success');
        } else return redirect()->route('admin.subject.index-subject', [$id])->with('create_message', 'danger');
    }

    public function deleteCategory($id)
    {
        //xóa chủ đề => xóa các câu hỏi trong chủ đề =>xóa các câu hỏi trong đề thi => cập nhật số lượng câu hỏi, điểm của đề thi.
        //xóa chủ đề
        $questions = Repository::getQuestion()->findBy('category_id', $id)->get();
        $a = Repository::getQuestionInExam()->getQuestionInExam($id);
        $category = Repository::getCategory()->delete($id);
        if($category){
            // dd(true);
            foreach($questions as $key=>$value){
                //xóa câu hỏi trong chủ đề
                Repository::getQuestion()->delete($value->id);
                //xóa các câu hỏi trong đề thi
                // $q = Repository::getQuestionInExam()->getCategoryInQuestion($id);
                $q = Repository::getQuestionInExam()->findBy('question_id',$value->id)->get();
                foreach($q as $k=>$v){
                    Repository::getQuestionInExam()->delete($v->id);
                }
                //cập nhật số lượng câu hỏi, điểm của đề thi.
                foreach($a as $index=>$item){
                    $exam = Repository::getExam()->findBy('id',$item->id)->first();
                    $num = ($exam->number_of_questions) - $item->number;
                    if($num == 0){
                        $data = [
                            "number_of_questions" => 0,
                            "score_per_question" => 0,
                        ];
                    }elseif($exam->number_of_questions > 1){
                        $data = [
                            "number_of_questions" => $num,
                            "score_per_question" => 100/$num,
                        ];
                    }
                    Repository::getExam()->updateMultiple('id',$item->id, $data);
                }
            }
            return redirect()->back()->with('delete_message', 'success');
        } else return redirect()->back()->with('delete_message', 'danger');
    }
}