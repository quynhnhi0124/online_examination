<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectCategoryModel extends Model
{
    use SoftDeletes;

    public $table = 'subject_category';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'subject_id','subject_category',
    ];

    public function subject()
    {
        return $this->belongsTo('App\SubjectModel');
    }
}
