<?php

namespace App\Services;

use App\User;

class UserService
{
    /**
     * Write a user
     *
     * @param User
     */
    public static function register($user)
    {
        return $user->create();
    }
}
