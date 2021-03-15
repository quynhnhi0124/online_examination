<?php

namespace App\Repositories\User;

use App\User;
use DB;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return User::class;
    }
    
    public function userPerMonth()
    {
        return $this->model->select(
                    DB::raw('month(created_at) as month'),
                    DB::raw("COUNT(*) as number"))
                ->groupBy(DB::raw("month(created_at)"))
                ->get();
    }

    public function systemRank(){
        return $this->model->select([
                                DB::raw('username as username'),
                                DB::raw('ifnull(COUNT(exam_id),0) as number'),
                                DB::raw('ifnull(AVG(score),0) as score'),])
                            ->leftJoin('student_attempt','student_attempt.student_id','=','users.id')
                            ->where('users.role', '=', '2')
                            ->groupBy('username')
                            ->orderBy("score","desc")
                            ->paginate(5);
    }
}