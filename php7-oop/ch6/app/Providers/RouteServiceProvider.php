<?php

namespace App\Providers;

use Eclair\Routing\Route;

class RouteServiceProvider extends \Eclair\Support\ServiceProvider
{
    /**
     * Loads routes
     */
    public static function register()
    {
        foreach ([ 'web', 'api' ] as $name) {
            require_once dirname(__DIR__, 2) . "/routes/{$name}.php";
        }
    }

    /**
     * Run routes
     */
    public static function boot()
    {
        Route::run();
    }
}
