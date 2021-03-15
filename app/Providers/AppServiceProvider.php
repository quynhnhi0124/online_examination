<?php

namespace App\Providers;

use App\Repositories\Repository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\User\UserRepository::class);
        $this->app->bind(\App\Repositories\Auth\PasswordRepository::class);
        $this->app->bind(\App\Repositories\Subject\SubjectRepository::class);
        $this->app->bind(\App\Repositories\User\UserRepositoryInterface::class);
        $this->app->bind(\App\Repositories\Auth\PasswordRepositoryInterface::class);
        $this->app->bind(\App\Repositories\Subject\SubjectRepositoryInterface::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $subject = Repository::getSubject()->join('subject_category','subject_category.subject_id','subjects.id')->unique('subject_id');
        $subject = Repository::getSubject()->get();
        View::share('subject',$subject);
    }
}
