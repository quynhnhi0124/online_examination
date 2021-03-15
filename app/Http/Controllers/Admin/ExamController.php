<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExamRequest;

class ExamController extends Controller
{

    public function indexExam($id)
    {
        $exams = Repository::getSubject()->joinWhere('exams', 'exams.subject_id', 'subjects.id', 'subjects.id', $id)->paginate(5);
        $student = Auth::user()->id;
        return view('subject.exam.index', ['exams' => $exams, 'student' => $student]);
    }

    public function getExam($subject_id)
    {
        $categories = Repository::getQuestion()->joinWhere('subject_category', 'questions.category_id', 'subject_category.id', 'questions.subject_id', $subject_id)->get();
        $questions = Repository::getSubject()->joinWhere('questions', 'questions.subject_id', 'subjects.id', 'questions.subject_id', $subject_id)->get();
        return view('subject.exam.create', ['questions' => $questions, 'categories' => $categories, 'subject_id' => $subject_id]);
    }

    public function createExam($subject_id, Request $request)
    {
        $request['subject_id'] = $subject_id;
        $input = $request->only(['subject_id', 'exam_name', 'number_of_questions', 'score_per_question', 'time']);
        $questions = $request->question_id;
        $question = explode(", ", $questions);
        $input += [
            'number_of_questions' => count($question),
            'score_per_question' => 100 / count($question),
        ];
        $exam = Repository::getExam()->insertGetId($input);
        $item = [];
        for ($i = 0; $i < count($question); $i++) {
            $item = [
                'exam_id' => $exam,
                'question_id' => $question[$i],
            ];
            $insert = Repository::getQuestionInExam()->insert($item);
        }
        if ($insert) {
            return redirect()->route('admin.subject.index-subject', ['id' => $subject_id])->with('notification', 'success');
        } else return redirect()->route('admin.subject.index-subject', ['id' => $subject_id])->with('notification', 'danger');
    }

    public function takeExam($student_id, $id)
    {
        $time = Carbon::now('Asia/Ho_Chi_Minh')->isoFormat('HH:mm');
        $exam = Repository::getExam()->find($id);
        $questions = Repository::getQuestion()->joinWhere('question_in_exam', 'question_in_exam.question_id', 'questions.id', 'question_in_exam.exam_id', $id)->get();
        return view('subject.exam.take-exam', [
            'time' => $time,
            'exam' => $exam,
            'questions' => $questions,
        ]);
    }

    public function submitExam($student_id, $id, Request $request)
    {
        $subject = Repository::getExam()->joinWhere('subjects', 'exams.subject_id', 'subjects.id', 'exams.id', $id)->get();
        $exam = Repository::getExam()->find($id);
        $item = [];
        $answers = Repository::getQuestionInExam()->getAnswer($id);
        foreach ($answers as $key => $value) {
            $item[$value->id] = $value->answer;
        }
        $input = $request->input("questions");
        if (empty($input)) {
            return redirect()->back()->with('submit_message', 'danger');

        }
        $attempt = $item;
        foreach ($attempt as $key => $value) {
            if (!array_key_exists($key, $input)) {
                $attempt[$key] = "_";
            } else {
                $attempt[$key] = $input[$key];
            }
        }
        $false = array_diff_assoc($item, $input);
        $score = (count($item) - count($false)) * ($exam->score_per_question);
        $student_id = Auth::user()->id;
        $index = [
            'student_id' => $student_id,
            'exam_id' => $id,
            'score' => $score,
        ];
        Repository::getStudentAttempt()->create($index);
        $message = "Bạn đã hoàn thành bài thi. Kết quả của bạn: ";
        return view('subject.exam.result', [
                                            's' => $subject, 
                                            'exam' => $exam, 
                                            'choices' => $attempt, 
                                            'answers' => $item, 
                                            'score' => $score, 
                                            'submit_message' => 'danger']);
    }

    public function deleteExam($id)
    {
        $questions = Repository::getQuestionInExam()->findBy('exam_id', $id)->get();
        for ($i = 0; $i < count($questions); $i++) {
            Repository::getQuestionInExam()->delete($questions[$i]->id);
        }
        $delete = Repository::getExam()->delete($id);
        if ($delete) {
            return redirect()->back()->with('delete-message', 'success');
        } else {
            return redirect()->back()->with('delete-message', 'danger');
        }
    }
}
