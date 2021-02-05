<?php

namespace App\Repositories;
use App\Repositories\User\UserRepository;
use App\Repositories\Auth\PasswordRepository;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\SubjectCategory\SubjectCategoryRepository;




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

    public static function getSubject()
    {
        return app(SubjectRepository::class);
    }

    public static function getCategory()
    {
        return app(SubjectCategoryRepository::class);
    }

    public static function getQuestion()
    {
        return app(QuestionRepository::class);
    }
}
