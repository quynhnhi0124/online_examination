<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    public $table = "questions";
    
    protected $fillable = [
        'subject_id','category_id','option_a','option_b','option_c','option_d','answer','image',
    ];

    public function question()
    {
        return $this->belongsTo('App\SubjectCategoryModel');
    }
}
