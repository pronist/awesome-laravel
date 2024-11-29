<?php

/**
 * Access Global Variables.
 */

$message = 'Hello, world';

function foo()
{
    // global $message;
    $GLOBALS['message'] = 'Who are you?';

    // $message = 'Who are you?';
    // echo $message;
}

foo();

// echo $message;

/**
 * Static variables.
 */
function foo2()
{
    static $count = 0;
    return ++$count;
}

// echo foo2();
// echo foo2();
// echo foo2();


/**
 * Clousre.
 */
function foo3($arg)
{
    return function () use ($arg) {
        return $arg;
    };
}

$func = foo3('Hello, world');
echo $func();
