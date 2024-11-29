<?php

/**
 * Anonymous Classes
 */
class A
{
    public function foo()
    {
    }
}

class B
{
    public function create()
    {
        // return new class extends A {
        // };
    }
}

$b = new B();
var_dump($b->create()->foo());
