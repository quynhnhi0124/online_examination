<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\QuestionModel;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestionRequest;


class QuestionController extends Controller
{
    public function question($subject_id, $category_id)
    {
        return view('subject.question.create',['subject_id'=>$subject_id, 'category_id'=>$category_id]);
    }

    public function createQuestion($subject_id,$category_id, Request $request)
    {
        $input = $request->input('q');
        $item = [];
        for($i = 0; $i < count($input); $i++)
        {
            $item = ['subject_id'=>$subject_id,
                'category_id'=>$category_id,
                ];
            $item += $input[$i];
            $insert = Repository::getQuestion()->insert($item);
        }
        if($item){
            return redirect()->route('admin.subject.index-question',['subject_id'=>$subject_id, 'category_id'=>$category_id])->with('create_message','success');
        }else{
            return redirect()->route('admin.subject.index-question',['subject_id'=>$subject_id, 'category_id'=>$category_id])->with('create_message','danger');
        }
    }

    public function indexQuestion($subject_id, $category_id)
    {
        $questions = Repository::getCategory()->joinWhere('questions', 'questions.category_id','subject_category.id','questions.category_id',$category_id)->paginate(10);
        $subjects = Repository::getSubject()->join('questions','questions.subject_id','subjects.id');
        $category = Repository::getCategory()->join('questions','questions.category_id','subject_category.id');
        return view('subject.question.index',['questions'=>$questions,'subject_id'=>$subject_id, 'category_id'=>$category_id]);
    }

    public function getUpdate($subject_id, $category_id,$id)
    {
        $question = Repository::getQuestion()->findBy('id',$id)->first();
        return view('subject.question.update',['question'=>$question,'subject_id'=>$subject_id, 'category_id'=>$category_id, 'id'=>$id]);
    }

    public function updateQuestion($subject_id, $category_id, $id, Request $request)
    {
        $input = $request->only([
            'question','option_a','option_b','option_c','option_d','answer','image'
        ]);
        $update = Repository::getQuestion()->update($id, $input);
        if($update){
            return redirect()->route('admin.subject.index-question',['subject_id'=>$subject_id, 'category_id'=>$category_id])->with('update_message','success');
        }else{
            return redirect()->route('admin.subject.index-question',['subject_id'=>$subject_id, 'category_id'=>$category_id])->with('update_message','danger');
        }
    }

    public function deleteQuestion($subject_id, $category_id,$id, Request $request)
    {   
        $delete = Repository::getQuestion()->delete($id);
        $questions = Repository::getQuestionInExam()->findBy('question_id',$id)->get();
        // dd($questions);
        if($delete && $questions){
            foreach($questions as $key=>$value){
                Repository::getQuestionInExam()->delete($value->id);
                $exam = Repository::getExam()->findBy('id',$questions[$key]->exam_id)->get();
                foreach($exam as $key=>$value){
                    $num = ($value->number_of_questions) - 1;
                    if($num == 0){
                        $data = [
                            "number_of_questions" => 0,
                            "score_per_question" => 0,
                        ];
                    }elseif($value->number_of_questions >= 1){
                        $data = [
                            "number_of_questions" => $num,
                            "score_per_question" => 100/$num,
                        ];
                    }
                    Repository::getExam()->updateMultiple('id',$exam[$key]->id, $data);
                }
            }
            return redirect()->route('admin.subject.index-question',['subject_id'=>$subject_id, 'category_id'=>$category_id])->with('delete_message','success');
        }
        else return redirect()->route('admin.subject.index-question',['subject_id'=>$subject_id, 'category_id'=>$category_id])->with('delete_message','danger');

    }
}
