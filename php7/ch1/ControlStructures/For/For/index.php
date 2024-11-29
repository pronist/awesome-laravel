<?php

/**
 * for.
 */

for ($i = 1; $i <= 10; $i++) {
    echo $i; // -> 1 ~ 10
}

/**
 * for with array.
 */
$messages = [
    'Hello, world',
    'Who are you?',
    'Bye'
];

for ($i = 0; $i < count($messages); $i++) {
    echo $messages[$i] . PHP_EOL;
}
