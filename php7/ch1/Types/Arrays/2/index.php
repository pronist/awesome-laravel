<?php

$messages = [
    'Hello, world',
    'Who are you?',
    'Bye',
];

/**
 * Insert.
 */
$messages[] = 'whoops';
// $messages[3] = 'whoops';

/**
 * Select.
 */
$messages[3];

/**
 * Update.
 */
$messages[3] = 'Do you know?';

/**
 * Delete.
 */
unset($messages[3]);
