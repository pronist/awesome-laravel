<?php

/**
 * WeakMap
 */
$weakMap = new WeakMap();

$class = new stdClass();
$weakMap[$class] = 'Hello, world';

/*
    [0]=>
    array(2) {
        ["key"]=>
        object(stdClass)#2 (0) {
        }
        ["value"]=>
        string(12) "Hello, world"
    }
}
*/
var_dump($weakMap);

unset($class);
/*
    object(WeakMap)#1 (0) {
    }
*/
var_dump($weakMap);
