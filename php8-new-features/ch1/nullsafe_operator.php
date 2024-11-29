<?php

/**
 * Nullsafe Operator
 */
class MyClass
{
    public function foo()
    {
        var_dump('Hello, world');
    }
}

// $myClass = null;
$myClass = new MyClass();

// before
if ($myClass !== null) {
    $myClass->foo();
}

// After
$myClass?->foo();
