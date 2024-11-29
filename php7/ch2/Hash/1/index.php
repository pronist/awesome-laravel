<?php

/**
 * Get hash algorithms
 */

hash_algos();

/**
 * Create a hash
 */
$hash = hash('sha256', 'Hello, world');
// $hash = crypt('Hello, world', 'secret');

/*
 * Check a hash
 */
hash_equals($hash, hash('sha256', 'Hello, world'));

/**
 * Hash Handler
 */
$h = hash_init('sha256');
hash_update($h, 'Hello, world');

hash_final($h);

/**
 * HMAC
 * Hash-based Message Authentication Code
 *
 * key -> "secret"
 */
hash_hmac_algos();

$hash = hash_hmac('sha256', 'Hello, world', 'secret');
hash_equals($hash, hash_hmac('sha256', 'Hello, world', 'secret'));
