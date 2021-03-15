<?php

namespace App\Repositories\Subject;

use DB;
use App\SubjectModel;
use App\Repositories\BaseRepository;
use App\Repositories\Subject\SubjectRepositoryInterface;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return SubjectModel::class;
    }

    public function examRatio()
    {
        return $this->model->select([
                                DB::raw('subjects.subject as subject'),
                                DB::raw("ifnull(COUNT(exam_name),0) as number"),
                                ])
                            ->leftJoin('exams','exams.subject_id','=','subjects.id')
                            ->groupBy(DB::raw("subject"))
                            ->get();
    }
    
}