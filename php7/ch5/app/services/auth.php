<?php

/**
 * Login
 *
 * @param string $email
 * @param string $password
 *
 * @return bool
 */
function signIn($email, $password)
{
    if ($user = first('SELECT * FROM users WHERE email = ? LIMIT 1', $email)) {
        if (password_verify($password, $user['password'])) {
            return $_SESSION['user'] = $user;
        }
    }
}

/**
 * Logout
 *
 * @return void
 */
function signOut()
{
    session_unset();
    return session_destroy();
}
