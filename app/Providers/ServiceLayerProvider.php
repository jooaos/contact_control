<?php

namespace App\Providers;

use App\Services\User\Contracts\UserSearchServiceContract;
use App\Services\User\Contracts\UserServiceContract;
use App\Services\User\UserSearchService;
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
        $this->app->bind(UserSearchServiceContract::class, UserSearchService::class);
    }
}
