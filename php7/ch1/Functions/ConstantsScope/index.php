<?php

// const MESSAGE = 'Hello, world';

/**
 * Constants Scope.
 */
function foo()
{
    define('MESSAGE', 'Hello, world');
}

foo();

// echo MESSAGE; // -> Hello, world


/**
 * Callbacks (Don't need 'use').
 */
$foo = function () {
    return MESSAGE;
};

echo $foo();
