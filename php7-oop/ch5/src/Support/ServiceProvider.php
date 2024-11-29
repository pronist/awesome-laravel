<?php

namespace Eclair\Support;

abstract class ServiceProvider
{
    /**
     * On register
     */
    public static function register()
    {
    }

    /**
     * On Boot (after 'register')
     */
    public static function boot()
    {
    }
}
