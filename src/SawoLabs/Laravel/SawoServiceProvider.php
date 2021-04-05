<?php

namespace SawoLabs\Laravel;

use Illuminate\Support\ServiceProvider;

class SawoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'sawo');

        $this->publishes([
            __DIR__.'/config/sawo.php' => config_path('sawo.php'),
        ], 'sawo-config');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/sawolabs/sawo'),
        ], 'sawo-views');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
