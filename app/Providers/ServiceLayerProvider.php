<?php

namespace App\Providers;

use App\Services\User\Contracts\UserServiceContract;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
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
        $this->app->bind(UserServiceContract::class, UserService::class);
    }
}
