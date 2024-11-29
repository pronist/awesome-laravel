<?php

/**
 * Classes/Objects Functions
 */
class A
{
    public $message = 'Hello, world';

    public function foo()
    {
        return $this->message;
    }
}

class B extends A
{
}

class_alias('A', 'MyClass');

/**
 * Exists
 */
// var_dump(
//     class_exists('MyClass'),
//     property_exists('MyClass', 'message')
// );

/**
 * Get
 */
$a = new MyClass();
$b = new B();

// var_dump(
//     get_class($a),
//     get_class_vars('MyClass'),
//     get_class_methods('MyClass')
// );

// var_dump(
//     get_declared_classes()
// );

// var_dump(
//     get_object_vars($a),
//     get_parent_class($b)
// );

/**
 * is
 */
var_dump(
    is_a($a, 'MyClass'),
    is_subclass_of($b, 'MyClass'),
    $a instanceof MyClass,
    $b instanceof MyClass
);
