<?php

namespace App\Repositories\Auth;

use App\ResetPasswordModel;
use App\Repositories\BaseRepository;
use App\Repositories\Auth\PasswordRepositoryInterface;

class PasswordRepository extends BaseRepository implements PasswordRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return ResetPasswordModel::class;
    }
    
}