<?php

/**
 * Spread Operator in Array Expression
 * https://wiki.php.net/rfc/spread_operator_for_array
 *
 * PHP 7.4 <=
 */

$messages = [
    'Hello, world'
];

// $messages = [
//     'Hello, world',
//     'Who are you?',
//     'Bye',
// ];
$messages = [
    ...$messages,
    'Who are you?',
    'Bye'
];
