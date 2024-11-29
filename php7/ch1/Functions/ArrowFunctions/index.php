<?php

/**
 * Arrow Functions
 * https://wiki.php.net/rfc/arrow_functions_v2
 *
 * PHP 7.4 <=
 */

$message = 'Hello, world';

function foo($callback)
{
    echo $callback();
}

foo(function () use ($message) {
    return $message;
});
foo(fn () => $message);
