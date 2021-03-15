<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Exports\PersonalExport;
use App\Repositories\Repository;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.user.home');
    }

    public function personalStatistic($id)
    {
        // thống kê cá nhân: 
        // Số bài thi tài khoản đã thực hiện (thực hiện bao nhiêu lần mỗi bài thi, điểm số cao nhất, thấp nhất ở mỗi bài thi)
        $attempts = Repository::getStudentAttempt()->personal($id);
        $a[0] = ["Bài thi", "Số lần thực hiện", "Số điểm cao nhất", "Số điểm thấp nhất"];
        foreach($attempts as $key=>$value){
            $a[++$key] = [
                $value->exam_name,
                $value->attempt,
                $value->max,
                $value->min,
                ];
        }

        // Khoảng điểm số của tài khoản
        $user = Repository::getStudentAttempt()->findBy('student_id',$id)->get();
        $first = 0;
        $second = 0;
        $third = 0;
        foreach($user as $key=>$value){
            if($user[$key]->score <=30){
                $first++;
            }
            if(($user[$key]->score > 30) && ($user[$key]->score < 60)){
                $second++;
            }
            if(($user[$key]->score > 60) && ($user[$key]->score < 100)){
                $third++;
            }
        }
        $p = [
            ["Khoảng điểm","Số lượng"],
            ["0-30", $first],
            ["30-60", $second],
            ["60-100", $third],
        ];
        return view('statistic.personal', ['attempts'=>$attempts, 'personal'=>json_encode($p)]);
    }

    public function export()
    {
        return Excel::download(new PersonalExport(), 'personal.xlsx');        
    }
}
