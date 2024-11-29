<?php

/**
 * Static return type
 */
class A
{
    public function getClass(): self
    {
        return $this;
    }
}

class B extends A {}

var_dump((new B())->getClass());

/**
 * CANNOT
 */
class C extends A
{
    // Is this an untyped static property,
    // or an instance property of type static?
    public static $a;

    // FUNCTION PARAMS
    // public function foo (static $a): void
    // {
    // }
}
