<?php

namespace App\Providers;

use Eclair\Support\Theme;

class ThemeServiceProvider extends \Eclair\Support\ServiceProvider
{
    /**
     * Set a Layout
     */
    public static function register()
    {
        Theme::setLayout(dirname(__DIR__, 2) . '/resources/views/layouts/app.php');
    }
}
