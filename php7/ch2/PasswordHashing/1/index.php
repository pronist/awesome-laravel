<?php

/**
 * Create a hash value for password
 */

$hash = password_hash('Hello, world', PASSWORD_DEFAULT);

/*
 * Verify password hash
 */
password_verify('Hello, world', $hash);

/**
 * Get info
 */
password_get_info($hash);

/**
 * Rehash
 */

$hash = password_hash('Hello, world', PASSWORD_DEFAULT, [
    'cost' => 10
]);

$options = [ 'cost' => 10 ];

password_needs_rehash($hash, PASSWORD_DEFAULT, $options);
