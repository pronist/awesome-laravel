<?php

$context = 1;

/**
 * Switch ~ case.
 */
switch ($context) {
    case 1:
        echo 'Hello, world';
        break;
    case 2:
        echo 'Who are you?';
        break;
    default:
        echo 'Bye';
}

/**
 * Switch ~ case -> If.
 */

if ($context == 1) {
    echo 'Hello, world';
} elseif ($context == 2) {
    echo 'Who are you?';
} else {
    echo 'Bye';
}
