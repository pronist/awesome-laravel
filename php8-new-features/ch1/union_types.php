<?php

/**
 * Union Types
 */
function foo(int|string $bar): int|string {
    return $bar;
}

var_dump(foo('Hello, world'));

/**
 *
 */
interface AInterface
{
    public function foo(int $bar): int|string;
}

class A implements AInterface
{
    public function foo(int|string $bar): int|string
    {
        return $bar;
    }
}

var_dump((new A())->foo('Hello, world'));

/**
 * (Super-Subclass) Subtype
 */
interface BInterface
{
    public function foo(B|C $bar): B|C;
}

class B {}
class C extends B {}

class D implements BInterface
{
    public function foo(B $bar): B
    {
        return new B();
    }
}

/**
 * Null
 */
// function sendMessage (string $to, ?string $message) {}
// Or,
function sendMessage(string $to, null|string $message) {}
sendMessage('pronist@naver.com', null);

/**
 * false
 */
function a(): int|false {}
