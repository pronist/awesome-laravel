<?php

/**
 * Login Form for a User (GET)
 */
function showLoginForm()
{
    return view('auth', [
        'requestUrl' => '/auth/login'
    ]);
}

/**
 * Create a User Session (POST)
 */
function login()
{
    $args = filter_input_array(INPUT_POST, [
        'email'     => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
        'password'  => FILTER_DEFAULT
    ]);

    return signIn(...array_values($args)) ? redirect('/') : reject();
}

/**
 * Delete a User Session (POST)
 */
function logout()
{
    return signOut() ? redirect('/') : reject();
}
