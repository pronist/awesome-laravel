<?php

session_save_path(dirname(__DIR__) . '/sessions');
session_start();

/**
 * # Cookie.
 *
 * /?PHPSESSID=123456789
 *
 * session.use_strict_mode
 *
 * session.use_cookies
 * session.use_only_cookies
 */

/**
 * # Javascript Injection.
 *
 * session.cookie_httpOnly
 */
echo '<script>document.write(document.cookie)</script>';

/**
 * # Https.
 *
 * session.cookie_secure
 */
