<?php

/**
 * Trailing Comma in Parameter list
 */
class A
{
    public function __construct(
        string $a,
        string $b,
    ) {}
}

new A(
    'Hello, world',
    'Who are you?',
);
