<?php

namespace App\Providers;

use App\Services\GlobalServiceProvider as ServicesGlobalServiceProvider;
use Illuminate\Support\ServiceProvider;

class GlobalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GlobalService', function($app){
            return new ServicesGlobalServiceProvider();
        });
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
