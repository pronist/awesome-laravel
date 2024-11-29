<?php

/**
 * Closure
 */
function foo()
{
    return 'Hello, world';
}

// $foo = fn () => 'Hello, world';
// var_dump(Closure::fromCallable('foo'));

class A
{
    private $message = 'Hello, world';
}

$foo = fn () => $this->message;

$a = new A();

// Function call
// var_dump($foo->call($a));

// $foo2 = $foo->bindTo($a, $a);
// var_dump($foo2());
