<?php

namespace BrianFaust\Alert;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

class AlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-alert.php' => config_path('laravel-alert.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-alert'),
        ], 'views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-alert');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-alert.php', 'laravel-alert');

        $this->app->singleton('alert', function (Container $app) {
            return new Alert($app['session.store']);
        });

        $this->app->alias('alert', Alert::class);
    }
}
