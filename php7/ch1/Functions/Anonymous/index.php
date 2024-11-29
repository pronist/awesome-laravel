<?php

/**
 * First class function.
 */

$foo = function () {
    return 'Hello, world';
};

// echo $foo();

function foo($callback)
{
    echo $callback();
}

// foo(
//     function () {
//         return 'Hello, world';
//     }
// );

/**
 * Higher-order function.
 */
function foo2()
{
    return function () {
        return 'Hello, world';
    };
}

$func = foo2();
echo $func(); // -> Hello, world
