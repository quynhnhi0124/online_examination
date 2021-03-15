<?php

namespace App\Repositories\QuestionInExam;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use App\QuestionInExamModel;


interface QuestionInExamRepositoryInterface {

    public function getAnswer($id);
    
}