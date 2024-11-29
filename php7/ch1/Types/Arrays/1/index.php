<?php

/**
 * Define Array.
 */

$messages = [
    'Hello, world',
    'Who are you?',
    'Bye'
];
// $messages = array('Hello, world', 'Who are you?', 'Bye');

/**
 * Define Array with key.
 */
$messages = [
    0           => 'Hello, world',
    'message'   => 'Who are you?',
    'Bye'
];

/**
 * Destructuring.
 */
// [, $message ] = [ 'Hello, world', 'Who are you?' ];
list(, $message) = ['Hello, world', 'Who are you?'];
// ['message' => $message ] = [ ... ]
list('message' => $message) = [
    'message' => 'Hello, world',
];
