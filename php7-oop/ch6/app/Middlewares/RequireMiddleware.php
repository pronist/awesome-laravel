<?php

namespace App\Middlewares;

class RequireMiddleware extends \Eclair\Routing\Middleware
{
    /**
     * Require All Params
     */
    public static function process()
    {
        if (count($_REQUEST) === count(array_filter($_REQUEST))) {
            return true;
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
