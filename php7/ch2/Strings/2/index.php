<?php

/**
 * Print formatted string
 *
 * -> %s String
 * -> %d Int
 * -> %f Float
 */

// $message = 'Hello, world';

// printf("%s, %d", $message, 10);
// printf("%s, %d", ...[ $message, 10 ]);
// vprintf("%s, %d", [
//     $message, 10
// ]);

/**
 * Buffering
 */
$message = 'Hello, world';

$buf = sprintf("%s", $message);
sprintf("%s, %d", ...[ $message, 10 ]);
echo vsprintf("%s, %d", [
    $message, 10
]);
