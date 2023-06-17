<?php

namespace App\Providers;

use App\Repository\User\Contracts\UserRepositoryContract;
use App\Repository\User\UserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryLayerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryContract::class, UserEloquentRepository::class);
    }
}
