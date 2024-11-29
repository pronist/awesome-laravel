<?php

/**
 * Store a user
 *
 * @param string $email
 * @param string $password
 * @param string $username
 *
 * @return bool
 */
function createUser($email, $password, $username)
{
    return execute('INSERT INTO users(email, password, username) VALUES(?, ? ,?)', $email, $password, $username);
}

/**
 * Update a user
 *
 * @param int $id
 * @param string $email
 * @param string $password
 * @param string $username
 *
 * @return bool
 */
function updateUser($id, $email, $password, $username)
{
    return execute('UPDATE users SET email = ?, password = ?, username = ? WHERE id = ?', $email, $password, $username, $id);
}
