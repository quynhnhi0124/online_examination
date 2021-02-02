<?php

namespace App\Repositories;
use App\Repositories\User\UserRepository;
use App\Repositories\Auth\PasswordRepository;


class Repository
{
    public static function getUser()
    {
        return app(UserRepository::class);
    }

    public static function getPassword()
    {
        return app(PasswordRepository::class);
    }
}
