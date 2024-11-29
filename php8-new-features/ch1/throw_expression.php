<?php

/**
 * Throw Expression
 */
$fn = fn () => throw new Exception();

function foo(): mixed {
    return throw new Exception();
}

try {
    foo();
} catch (Exception) {
}
