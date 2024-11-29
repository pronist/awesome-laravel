<?php

/**
 * WeakReference
 */

// $messages = [
//     'sayHello' => 'Hello, world'
// ];
// var_dump((object) $messages);

$class = new stdClass();

$weakRef = WeakReference::create($class);
var_dump($weakRef->get());

unset($class);

var_dump($weakRef->get());
