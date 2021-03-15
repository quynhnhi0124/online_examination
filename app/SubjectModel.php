<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectModel extends Model
{
    use SoftDeletes;

    public $table='subjects';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'subject',
    ];

    public function subjectCategory()
    {
        return $this->hasMany('App\SubjectCategoryModel');
    }
}
