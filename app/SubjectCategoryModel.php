<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectCategoryModel extends Model
{
    public $table = 'subject_category';

    protected $fillable = [
        'subject_id','subject_category',
    ];

    public function subject()
    {
        return $this->belongsTo('App\SubjectModel');
    }
}
