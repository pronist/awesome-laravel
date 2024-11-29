<?php

/**
 * return value.
 *
 * function <name>(...)[: <return_type>]
 */
function foo(): string
{
    return 'Hello, world';
}

// echo foo(); // -> Hello, world

/**
 * return with context.
 */
function foo2(bool $is)
{
    if ($is) {
        return 'Hello, world';
    }
    return 'Bye';
}

// echo foo2(true); // -> Hello, world

/**
 * return variables
 */

function foo3($arg)
{
    return $arg;
}

// echo foo3('Hello, world'); // -> Hello, world
