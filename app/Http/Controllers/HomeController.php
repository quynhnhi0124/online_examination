<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function homepage()
    {
        $subjects = Repository::getSubject()->get();
        $exams = Repository::getExam()->count();
        $users = Repository::getUser()->count();
        $attempts = Repository::getStudentAttempt()->count();
        $data = DB::table('users')
        ->select([
            DB::raw('username as username'),
            DB::raw('ifnull(COUNT(exam_id), 0) as number'),
            DB::raw('ifnull(AVG(score), 0) as score'),])
        ->leftJoin('student_attempt', 'student_attempt.student_id', '=' ,'users.id')
        ->where('users.role', '=' , '2')
        ->orderBy("score", "desc")
        ->take(3)
        ->groupBy('username')
        ->get();
        return view('welcome', ['subjects'=>$subjects, 'exams'=>$exams, 'users'=>$users, 'attempts'=>$attempts, 'data'=>$data]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home');
    }

    public function errorPage()
    {
        return view('404-page');
    }
}
