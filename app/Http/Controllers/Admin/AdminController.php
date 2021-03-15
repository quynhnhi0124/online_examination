<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\User;
use App\ExamModel;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function viewUser()
    {
        $users = Repository::getUser()->where('id','!=',Auth::user()->id)->paginate(5);
        return view('admin.user-manage', ['users' => $users]);
    }

    public function editUser($id, Request $request)
    {
        $input = $request->only([
            'role',
            'status',
        ]);
        $edit = Repository::getUser()->update($id, $input);
        if ($edit) {
            return redirect()->back()->with('notification', 'success');
        } else {
            return redirect()->back()->with('notification', 'danger');

        }
    }

    public function export()
    {
        return Excel::download(new UserExport(), 'user.xlsx');

    }

    public function systemStatistic()
    {
        // số người dùng:
        $users = Repository::getUser()->count();

        // số người dùng đăng kí trong mỗi tháng
        $data = Repository::getUser()->userPerMonth();
        $u[] = ['Tháng', 'Số lượng'];
        foreach ($data as $key => $value) {
            $u[++$key] = [$value->month, $value->number];
        }

        //số người dùng mỗi quyền
        $data2 = Repository::getRole()->role();
        $r[] = ['Vị trí', 'Số lượng'];
        foreach ($data2 as $key => $value) {
            $r[++$key] = [$value->role, $value->number];
        }
        // số đề thi:
        $exams = Repository::getExam()->count();
        //Tỉ lệ đề thi ở các môn thi
        // $data3 = Repository::getSubject()->examRatio();
        // $e[] = ['Môn thi', 'Tỉ lệ'];
        // foreach ($data3 as $key => $value) {
        //     $e[++$key] = [$value->subject, $value->number];
        // }
        //tỉ lệ môn thi được chọn vào thi
        $data4 = Repository::getStudentAttempt()->getAttempt();
        $a[] = ['Môn thi', 'Tỉ lệ'];
        foreach ($data4 as $key => $value) {
            $a[++$key] = [$value->subject, $value->number];
        }
        return view('statistic.system', [
            'users' => $users,
            'exams' => $exams,
            'u' => json_encode($u),
            'r' => json_encode($r),
            'a' => json_encode($a)
        ]);
    }

    public function rank()
    {
        //thống kê theo toàn hệ thống
        $data = Repository::getUser()->systemRank();
        // for($i = 0; $i <count($data); $i++){
        //     $top = [];

        // }
        return view('statistic.rank', ['data' => $data]);
    }

    public function rankSubject($id)
    {
        $subjects = Repository::getSubject()->find($id);
        $exams = Repository::getSubject()->joinWhere('exams', 'exams.subject_id', 'subjects.id', 'subjects.id', $id)
            ->paginate(10);
        // dd($subjects->id, $);
        return view('statistic.rank-subject', ['su' => $subjects, 'exams' => $exams]);
    }

    public function rankDetail($id, $exam_id)
    {
        $subjects = Repository::getSubject()->find($id);
        $exams = Repository::getExam()->joinWhere('subjects', 'exams.subject_id', 'subjects.id', 'subjects.id', $id)
            ->paginate(10);
        //xếp hạng trong mỗi bài thi
        $attempts = Repository::getStudentAttempt()->subjectRank($exam_id);
        return view('statistic.rank-detail', ['su' => $subjects, 'exams' => $exams, 'attempts' => $attempts]);
        //xếp hạng trong mỗi bài thi: db student attempt join vs users: điểm thi cao nhất từ mỗi
    }

    //search in user manage
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $users = User::SearchByKeyword($keyword, true)->paginate(5);
        return view('admin.user-manage', ['users' => $users]);
    }

    //search by name of exams in rank
    public function subjectSearch($id, Request $request)
    {
        $subjects = Repository::getSubject()->find($id);
        $keyword = $request->input('search');
        $exams = ExamModel::SearchByKeyWord($keyword,true)->paginate(10);
        // dd($exams);
        return view('statistic.rank-subject', ['su' => $subjects, 'exams' => $exams]);
        
    }
}
