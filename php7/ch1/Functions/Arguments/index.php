<?php

/**
 * Define function with Parameters.
 *
 * function <name>([[datatype] <param_name> [= defualt value], ...])
 */

function foo(string $arg)
{
    echo $arg;
}

// foo('Hello, world'); // -> Hello, world

/**
 * Default Parameter
 */
function foo2($arg = 'Hello, world')
{
    echo $arg;
}

// foo2(); // -> Hello, world

/**
 * Define function with Rest parameters.
 */

function foo3(...$args)
{
    var_dump($args);
}

// foo3('Hello, world', 'Who are you?', 'Bye');


/**
 * Call function with Spread.
 */

function foo4($arg1, $arg2, $arg3)
{
    var_dump($arg1, $arg2, $arg3);
}

$args = [ 'Hello, world', 'Who are you?', 'Bye' ];

foo4(...$args);
