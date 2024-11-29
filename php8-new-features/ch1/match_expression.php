<?php

/**
 * Match Expression
 */
$message = null;

$code = 600;

// Before
// switch ($code) {
//     case 400:
//         $message = 'Bad Reqeust';
//         break;
//     case 200:
//         $message = 'OK';
//         break;
//     // default:
//     //     $message = 'Hello, world';
// }

// After
$message = match ($code) {
    400 => 'Bad Request',
    200, 201, 202, 203 => 'OK',
    500 => 'Internal Server Error',
    // default => 'Hello, world'
};

var_dump($message);
