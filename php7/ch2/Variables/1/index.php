<?php

$message = 'Hello, world';

/*
 * Type.
 */
// Get
gettype($message);
// Set
settype($message, 'int');

// Int
is_int(10);
// string
is_string('Hello, world');
// iterable
is_iterable([]);

/*
 * Value check
 */
isset($message);
empty($message);

/*
 * Convert to
 */
// Int -> String
strval(10);

/**
 * Print
 */
$var = [
    'message' => 'Hello, world'
];

// for Reading
// print_r($var);
// for Debug
// var_dump($var);
// for Expression
// var_export($var);

/**
 * Serialize.
 */
$serializedArray =  serialize($var);
$arr = unserialize($serializedArray);

/*
 * Free.
 */
unset($arr);

/**
 * Get defined ...
 */
// Variables
get_defined_vars();
// Constants
get_defined_constants();

/**
 * Constants
 */
const MESSAGE = 'Hello, world';
if (defined('MESSAGE')) {
    echo constant('MESSAGE');
}
