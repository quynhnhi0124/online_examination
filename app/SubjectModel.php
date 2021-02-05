<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    public $table='subjects';

    protected $fillable = [
        'subject',
    ];

    public function subjectCategory()
    {
        return $this->hasMany('App\SubjectCategoryModel');
    }
}
