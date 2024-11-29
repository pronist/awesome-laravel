<?php

/**
 * Mixed Type
 */
function foo(mixed $bar): mixed {
    return $bar;
}

var_dump(foo('Hello, world'));
var_dump(foo(fn () => 'Hello, world'));
var_dump(foo(new class {}));
