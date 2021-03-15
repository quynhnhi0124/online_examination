<?php

namespace App\Repositories\User;

use DB;
use App\StudentAttemptModel;
use App\Repositories\BaseRepository;
use App\Repositories\User\StudentAttemptRepositoryInterface;

class StudentAttemptRepository extends BaseRepository implements StudentAttemptRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return StudentAttemptModel::class;
    }

    public function getAttempt()
    {
        return $this->model->select([
                                DB::raw('subjects.subject as subject'),
                                DB::raw('ifnull(COUNT(student_attempt.exam_id),0) as number'),])
                            ->join('exams','student_attempt.exam_id','=','exams.id')
                            ->rightJoin('subjects','exams.subject_id','=','subjects.id')
                            ->groupBy(DB::raw('subject'))
                            ->get();
    }

    public function subjectRank($exam_id)
    {
        return $this->model->select([
                                    DB::raw('max(score) as score'),
                                    'student_id',
                                    'username'])
                            ->join('users','student_attempt.student_id','users.id')
                            ->where('student_attempt.exam_id','=',$exam_id)
                            ->groupBy('student_id','users.username')
                            ->orderBy('score','desc')
                            ->paginate(10);
    }
    
    public function personal($id){
        return $this->model->select([
                                DB::raw('ifnull(COUNT(student_id),0) as attempt'),
                                DB::raw('MIN(score) as min'),
                                DB::raw('MAX(score) as max'),
                                'exams.exam_name'])
                            ->join('exams','student_attempt.exam_id','=','exams.id')
                            ->where('student_attempt.student_id','=',$id)
                            ->groupBy('student_attempt.exam_id','exams.exam_name')
                            ->paginate(5);
    }

    public static function scopeSearchByKeyword($query, $keyword)
    {
        if($keyword != " ")
        {
            $query->where(function ($query) use ($keyword){
                $query->where("firstname", "LIKE","%$keyword%")
                ->orwhere("lastname", "LIKE","%$keyword%")
                ->orWhere("username", "LIKE", "%$keyword%")
                ->orWhere("email", "LIKE", "%$keyword%");
            });
            return $query;
        }
    }
}