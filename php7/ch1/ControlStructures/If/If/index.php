<?php

/**
 * if.
 */

// [], '', false, 0, null -> false
if (true) {
    echo 'Hello, world';
}

/**
 * if ~ else.
 */
if (false) {
    echo 'Hello, world';
} else {
    echo 'Bye';
}

/**
 * if ~ elseif ~ else.
 */
if (false) {
    echo 'Hello, world';
} elseif (true) {
    echo 'Who are you?';
} else {
    echo 'Bye';
}

/**
 * Define Variables in If Context.
 */
if ($message = 'Hello, world') {
    echo $message;
}
