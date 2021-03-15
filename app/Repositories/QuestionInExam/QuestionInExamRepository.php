<?php

namespace App\Repositories\QuestionInExam;

use DB;
use App\QuestionInExamModel;
use App\Repositories\BaseRepository;
use App\Repositories\QuestionInExam\QuestionInExamRepositoryInterface;

class QuestionInExamRepository extends BaseRepository implements QuestionInExamRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return QuestionInExamModel::class;
    }

    public function getAnswer($id)
    {
        //lấy đáp án bài kiểm tra mã $id 

        return $this->model->select(
                                'questions.id',
                                'questions.answer')
                            ->join('exams', 'question_in_exam.exam_id', '=', 'exams.id')
                            ->join('questions', 'questions.id', '=', 'question_in_exam.question_id')
                            ->where('question_in_exam.exam_id','=',$id)
                            ->distinct()->get();
    }

    public function getCategoryInQuestion($id)
    {
        return $this->model->select([
                            'subject_category.id',
                            'subject_category.subject_category',
                            'question_in_exam.question_id',
                            'question_in_exam.exam_id'])
                            ->join('questions','questions.id','=','question_in_exam.question_id')
                            ->join('subject_category','questions.category_id','=','subject_category.id')
                            ->where('subject_category.id','=',$id)->get();
            
    }

    public function getQuestionInExam($id){
        return $this->model->select([DB::raw('COUNT(question_in_exam.question_id) as number'),
                                    'exams.id',])
                            ->join('exams','question_in_exam.exam_id','=','exams.id')
                            ->join('questions','questions.id','=','question_in_exam.question_id')
                            ->where('questions.category_id','=',$id)
                            ->whereNull('question_in_exam.deleted_at')->groupBy('exams.id')
                            ->get();
    }
    
}