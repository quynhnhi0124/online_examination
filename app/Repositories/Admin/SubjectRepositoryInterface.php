<?php

namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;
use App\SubjectModel;

interface SubjectRepositoryInterface
{
    public function examRatio();
}