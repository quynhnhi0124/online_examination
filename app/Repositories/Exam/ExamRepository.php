<?php

namespace App\Repositories\Exam;

use App\ExamModel;
use App\Repositories\BaseRepository;
use App\Repositories\Exam\ExamRepositoryInterface;

class ExamRepository extends BaseRepository implements ExamRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return ExamModel::class;
    }
    
}