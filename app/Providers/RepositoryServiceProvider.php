<?php

namespace App\Providers;

use App\Interfaces\ServiceRepositoryInterface;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ServiceRepositoryInterface::class, 
            ServiceRepository::class
        );
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
