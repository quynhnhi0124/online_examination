<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return User::class;
    }
    
}