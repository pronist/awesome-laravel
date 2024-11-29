<?php

trait Printable
{
    public function __toString()
    {
        return $this->message;
    }
}

/**
 * Constructor Promotion
 */
// Before
class A
{
    use Printable;

    public string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }
}

$a = new A('Hello, world');
echo $a;

// After
class B
{
    use Printable;

    public function __construct(public string $message)
    {
    }
}

$b = new B('Hello, world');
echo $b;

/**
 * Default value, with Normal Constructor Params
 */
class C
{
    use Printable;

    // public string $message; // -> ERROR

    public function __construct(string $to, public string $message = 'Hello, world')
    {
    }
}

$c = new C(to: 'pronist@naver.com', message: 'Hello, world');
echo $c;
