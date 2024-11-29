<?php

/**
 * Define Variables.
 *
 * http://docs.php.net/manual/en/language.types.php
 */

$message = 'Hello, world'; // String
$userCount = 0; // Int
$pi = 3.14; // Double
$is_visited = false; // Boolean
$temp = null; // NULL

/**
 * Using Variables.
 */
$message;

/**
 * Using Variables in String.
 */
// -> The message is Hello, world;
"The message is {$message}";

/**
 * Here Doc, Now Doc.
 */
<<<HTML
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HTML Template</title>
    </head>
    <body>
        <h1>$message</h1>
    </body>
</html>
HTML;

/**
 * Free.
 */
unset($message);
