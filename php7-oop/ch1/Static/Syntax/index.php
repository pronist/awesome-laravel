<?php

/**
 * Static
 */
class A
{
    public static $message = 'Hello, world';

    public static function foo()
    {
        return self::$message;
    }
}

// var_dump(A::$message);

$classname = 'A';

$a = new $classname();
var_dump($a->foo());
