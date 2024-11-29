<?php

/**
 * Static Binding
 */
class A
{
    // public static function foo()
    public function foo()
    {
        static::who();
    }

    // public static function who()
    public function who()
    {
        var_dump(__CLASS__);
    }
}

class B extends A
{
    // public static function test()
    public function test()
    {
        A::foo();

        // parent::foo();
        // self::foo();
    }

    // public static function who()
    public function who()
    {
        var_dump(__CLASS__);
    }
}

$b = new B();
$b->test();
