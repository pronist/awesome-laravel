<?php

namespace App\Controllers;

use Eclair\Support\Theme;
use App\Services\UserService;
use App\User;

class UserController
{
    /**
     * Register Form for a new User (GET)
     */
    public static function create()
    {
        return Theme::view('auth', [
            'requestUrl' => '/users'
        ]);
    }

    /**
     * Create a new User (POST)
     */
    public static function store()
    {
        $user = new User();

        $user->email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        $user->password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);

        return UserService::register($user)
            ? header('Location: /auth/login')
            : header('Location: ' . $_SERVER['HTTP_REFERER'])
        ;
    }
}
