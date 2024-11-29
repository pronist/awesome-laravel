<?php

/**
 * Trait
 */
trait A
{
    private $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract public function foo();
}

trait AA
{
    public function sayHello()
    {
        return __TRAIT__;
    }
}

// trait AAA
// {
//     use A, AA {
//         A::sayHello insteadof AA;
//         A::sayHello as protected h;
//     }
// }

class B
{
    use A, AA {
        A::sayHello insteadof AA;
        A::sayHello as protected h;
    }

    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
var_dump($b->sayHello());


class C
{
    private $message = 'Hello, world';

    public function sayHello()
    {
        return $this->message;
    }
}

trait D
{
    public function sayHello()
    {
        return __TRAIT__;
    }
}

class E extends C
{
    use D;

    public function sayHello()
    {
        return __CLASS__;
    }
}

$e = new E();
var_dump($e->sayHello());
