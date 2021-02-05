<?php

namespace App\Repositories\Question;

use App\QuestionModel;
use App\Repositories\BaseRepository;
use App\Repositories\Question\QuestionRepositoryInterface;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return QuestionModel::class;
    }
    
}