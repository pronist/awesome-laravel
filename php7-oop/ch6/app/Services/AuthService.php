<?php

namespace App\Services;

use Eclair\Database\Adaptor;

class AuthService
{
    /**
     * Login
     *
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public static function login($email, $password)
    {
        if ($user = current(Adaptor::getAll('SELECT * FROM users WHERE `email` = ?', [ $email ], \App\User::class))) {
            if (password_verify($password, $user->password)) {
                return $_SESSION['user'] = $user;
            }
        }
    }

    /**
     * Logout
     *
     * @return bool
     */
    public static function logout()
    {
        session_unset();

        return session_destroy();
    }
}
