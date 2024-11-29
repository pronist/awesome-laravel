<?php

function foo(A $a)
{
    return $a->foo();
}

/**
 * Interface
 */
interface A
{
    public function foo();
}

interface AA extends A
{
    public function sayHello();
}

class B implements AA
{
    public function foo()
    {
        return __CLASS__;
    }

    public function sayHello()
    {
        return 'Hello, world';
    }
}

$b = new B();
var_dump(foo($b));
