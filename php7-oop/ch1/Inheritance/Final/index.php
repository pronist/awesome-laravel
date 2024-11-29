<?php

/**
 * Final
 */
final class A
{
    public $message;

    final public function foo()
    {
    }
}

class B extends A
{
    public function foo()
    {
    }
}
