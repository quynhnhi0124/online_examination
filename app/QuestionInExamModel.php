<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class QuestionInExamModel extends Model
{

    use SoftDeletes;

    public $table = 'question_in_exam';

    protected $fillables = ['exam_id','question_id'];

    protected $dates = ['deleted_at'];

}
