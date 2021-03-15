<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamModel extends Model
{
    use SoftDeletes;

    public $table = "exams";

    protected $dates = ['deleted_at'];

    protected $fillables = ['subject_id','exam_name','time','number_of_questions','score_per_question'];

    public static function scopeSearchByKeyword($query, $keyword)
    {
        if($keyword != " "){
            $query->where(function ($query) use ($keyword){
                $query->where("exam_name", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
