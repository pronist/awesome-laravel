<?php

namespace App\Controllers;

use Eclair\Support\Theme;
use App\Services\AuthService;

class AuthController
{
    /**
     * Login Form for a User (GET)
     */
    public static function showLoginForm()
    {
        return Theme::view('auth', [
            'requestUrl' => '/auth'
        ]);
    }

    /**
     * Create a User Session (POST)
     */
    public static function login()
    {
        [ $email, $password ] = array_values(filter_input_array(INPUT_POST, [
            'email' => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
            'password' => FILTER_DEFAULT
        ]));

        return AuthService::login($email, $password)
            ? header('Location: /')
            : header('Location: ' . $_SERVER['HTTP_REFERER'])
        ;
    }

    /**
     * Delete a User Session (POST)
     */
    public static function logout()
    {
        return AuthService::logout();
    }
}
