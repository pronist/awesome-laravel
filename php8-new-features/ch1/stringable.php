<?php

/**
 * Stringable
 */
class A implements Stringable
{
    public function __toString()
    {
        return __CLASS__;
    }
}

echo new A(); // -> A
