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
        $this->app->bind(
            \App\Repositories\PlayerRepositoryInterface::class,
            \App\Repositories\PlayerRepository::class
        );

        $this->app->bind(
            \App\Repositories\RoomRepositoryInterface::class,
            \App\Repositories\RoomRepository::class
        );

        $this->app->bind(
            \App\Repositories\RoleStatusRepositoryInterface::class,
            \App\Repositories\RoleStatusRepository::class
        );
    }
}
