<?php

session_save_path(dirname(__DIR__) . '/sessions');

/**
 * Cookie lifetime, GC.
 */
ini_set('session.gc_maxlifetime', 3);
session_set_cookie_params(3);

session_start();
// session_gc();

/**
 * Timestamp based session.
 */
$_SESSION['timestamp'] = $_SERVER['REQUEST_TIME'];

// sleep(10);
$time = strtotime('+5 seconds');

$diff = $time - $_SESSION['timestamp'];
$sessionTimeout = 10;

if ($diff >= $sessionTimeout) {
    echo 'Session Timeout';
    exit;
}

/**
 * Renewal session.
 */
// session_regenerate_id();
// $_SESSION['timestamp'] = time();
