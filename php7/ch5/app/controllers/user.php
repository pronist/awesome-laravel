<?php

/**
 * Register Form for a new User (GET)
 */
function create()
{
    return view('auth', [ 'requestUrl' => '/user/register' ]);
}

/**
 * Create a new User (POST)
 */
function store()
{
    return base(function ($args) {
        return createUser(...array_values($args)) &&
            redirect('/auth/login')
        ;
    });
}

/**
 * Update Form for User informations (GET)
 */
function edit()
{
    return view('auth', [
        'requestUrl' => '/user/update',
        'email'      => $_SESSION['user']['email']
    ]);
}

/**
 * Update User informations (POST)
 */
function update()
{
    return base(function ($args) {
        return updateUser(
            $_SESSION['user']['id'],
            ...array_values($args)
        ) && redirect('/auth/login');
    });
}

/**
 * @param callback $callback
 *
 * @return bool|void
 */
function base($callback)
{
    $args = filter_input_array(INPUT_POST, [
        'email'     => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
        'password'  => FILTER_SANITIZE_STRING
    ]);
    $args['username'] = current(explode('@', $args['email']));
    $args['password'] = password_hash($args['password'], PASSWORD_DEFAULT);

    return call_user_func($callback, $args) ? signOut() : reject();
}
