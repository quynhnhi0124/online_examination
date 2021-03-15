<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use App\StudentAttempModel;


interface StudentAttemptRepositoryInterface {

    public function getAttempt();
    
    public function subjectRank($exam_id);

    public function personal($id);
}