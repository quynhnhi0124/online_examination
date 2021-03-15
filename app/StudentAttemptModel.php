<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttemptModel extends Model
{
    public $table = "student_attempt";
    protected $fillable = ['student_id','exam_id','start_time','finish_time','score']; 
}
