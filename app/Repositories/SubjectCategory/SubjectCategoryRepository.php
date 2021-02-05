<?php

namespace App\Repositories\SubjectCategory;

use App\SubjectCategoryModel;
use App\Repositories\BaseRepository;
use App\Repositories\SubjectCategory\SubjectCategoryRepositoryInterface;

class SubjectCategoryRepository extends BaseRepository implements SubjectCategoryRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return SubjectCategoryModel::class;
    }
    
}