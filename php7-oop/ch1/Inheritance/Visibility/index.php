<?php

/**
 * Visibility
 */
class A
{
    public $public = 'public';
    protected $protected = 'protected';
    private $private = 'private';
}

// $a = new A();
// var_dump($a->private);

class B extends A
{
    private $message = 'Hello, world';

    private static $instance;

    private function __construct()
    {
        var_dump($this->message);
    }

    public static function getInstance()
    {
        return self::$instance ?: self::$instance = new self();
    }
}

// $b = new B();
// var_dump($b->foo());

$b = B::getInstance();
