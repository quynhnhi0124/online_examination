<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionModel extends Model
{
    use SoftDeletes;

    public $table = "questions";

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'question','subject_id','category_id','option_a','option_b','option_c','option_d','answer','image',
    ];


    public function question()
    {
        return $this->belongsTo('App\SubjectCategoryModel');
    }
}
