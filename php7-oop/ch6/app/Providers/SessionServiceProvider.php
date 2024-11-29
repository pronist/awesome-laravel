<?php

namespace App\Providers;

use Eclair\Session\DatabaseSessionHandler;

class SessionServiceProvider extends \Eclair\Support\ServiceProvider
{
    /**
     * Prepare session before starting
     */
    public static function register()
    {
        session_set_save_handler(new DatabaseSessionHandler());
    }

    /**
     * Session start
     */
    public static function boot()
    {
        session_start();
    }
}
