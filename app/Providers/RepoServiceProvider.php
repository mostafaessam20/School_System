<?php

namespace App\Providers;

use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( 'App\Repository\TeacherRepositoryInterface','App\Repository\TeacherRepository');
        $this->app->bind( 'App\Repository\StudentRepositoryInterface','App\Repository\StudentRepository');
        $this->app->bind( 'App\Repository\StudentPromotionRepositoryInterface','App\Repository\StudentPromotionRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
