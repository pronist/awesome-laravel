<?php

/**
 * Magic Methods: Methods
 */
class A
{
    public function __call($name, $args)
    {
        var_dump($name, $args);
    }

    public static function __callStatic($name, $args)
    {
        var_dump($name, $args);
    }

    public function __invoke(...$args)
    {
        var_dump($args);
    }
}

$a = new A();
$a('Hello, world', 'Who are you?');

// $a->foo('Hello, world');
// A::foo();
