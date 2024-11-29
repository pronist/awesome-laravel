<?php

/**
 * Error
 */

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    return error_log("[{$errno}] {$errstr} in {$errfile} on line {$errline}" . PHP_EOL, 3, config('error.path'));
});
