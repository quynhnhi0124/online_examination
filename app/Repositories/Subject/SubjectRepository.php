<?php

namespace App\Repositories\Subject;

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
    
}