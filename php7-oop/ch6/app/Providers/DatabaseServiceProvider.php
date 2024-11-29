<?php

namespace App\Providers;

use Eclair\Database\Adaptor;

class DatabaseServiceProvider extends \Eclair\Support\ServiceProvider
{
    /**
     * Setup Database
     */
    public static function register()
    {
        Adaptor::setup('mysql:dbname=phpblog', 'root', 'root');
    }
}
