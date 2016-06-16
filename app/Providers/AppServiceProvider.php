<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Smile\Users\UserRepositoryInterface', 'App\Smile\Users\DbUserRepository');
        $this->app->singleton('App\Smile\Posts\PostRepositoryInterface', 'App\Smile\Posts\DbPostRepository');
        $this->app->singleton('App\Smile\Tags\TagRepositoryInterface', 'App\Smile\Tags\DbTagRepository');
    }
}
