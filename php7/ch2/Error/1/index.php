<?php

/**
 * Log Level.
 */

error_reporting(E_ALL & ~E_NOTICE);

/**
 * Send Error Log.
 */
error_log('Hello, world', 3, __DIR__ . '/logs/log.log');

/**
 * Backtrace.
 */
function foo()
{
    // debug_print_backtrace();
    var_dump(debug_backtrace());
}

// foo();

/**
 * Ignore Errors.
 */
function foo2()
{
    asdfasdf;
}

// @ Operator.
// @foo2();

/**
 * Error Handling
 *
 * http://docs.php.net/manual/en/errorfunc.constants.php
 */
// Set
set_error_handler(function ($errno, $errstr) {
    switch ($errno) {
        case E_USER_ERROR:
            var_dump($errstr);
            break;
    }
});
// Reset
// restore_error_handler();

/**
 * Trigger Custom Error.
 */
trigger_error('Hello, world', E_USER_ERROR);
