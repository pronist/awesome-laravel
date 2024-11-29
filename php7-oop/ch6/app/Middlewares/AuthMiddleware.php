<?php

namespace App\Middlewares;

class AuthMiddleware extends \Eclair\Routing\Middleware
{
    /**
     * Auth guard
     */
    public static function process()
    {
        if (array_key_exists('user', $_SESSION)) {
            return true;
        }

        return header('Location: /auth/login');
    }
}
