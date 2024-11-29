<?php

/**
 * PHP Extension.
 */

// Loaded
extension_loaded('mbstring');
// Gets
get_loaded_extensions();

/**
 * include Path.
 */
// Set
set_include_path(__DIR__ . '/mylib');
// include 'HelloWorld.php'; // -> Hello, world
// Get
get_include_path();
// Reset
restore_include_path();
// include 'HelloWorld.php'; //-> Error

/**
 * Get included Files.
 */
get_included_files();

/**
 * Get php information.
 */
// phpinfo();

/**
 * php.ini
 */
// Set
ini_set('session.gc_maxlifetime', 1440);
// Get
ini_get('session.gc_maxlifetime'); // -> 1440
// Reset
ini_restore('session.gc_maxlifetime');

/**
 * Environment Variables.
 */

/**
 * Case 1. put, getenv
 */
// Set
putenv('APP_ENV=' . 'production');
// Get
getenv('APP_ENV'); // -> production

/**
 * Case 2. $_ENV
 */
// Set
$_ENV['APP_ENV'] = 'development';
// Get
$_ENV['APP_ENV']; // -> development
