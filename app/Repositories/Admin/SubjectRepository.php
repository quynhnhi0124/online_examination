<?php

namespace App\Repositories\Admin;

use DB;
use App\Model\Admin\SubjectModel;
use App\Repositories\BaseRepository;

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