<?php

namespace App\Repositories;
use App\Repositories\User\UserRepository;

class Repository
{
    public static function getUser()
    {
        return app(UserRepository::class);
    }
}
