<?php

namespace Jandrodev\Laratest;

use Illuminate\Support\ServiceProvider;

class LaratestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // php artisan vendor:publish --provider="Jandrodev\Laratest\LaratestServiceProvider" --tag="config"
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/config.php' => config_path('laratest.php')], 'config');
        }
    }
}
