<?php

/**
 * Data Structures
 */

// Case 1. Stack

$st = new SplStack();

$st->push('Hello, world');
$st->push('Bye');

// var_dump($st->pop());

// Case 2. Queue

$qu = new SplQueue();

$qu->enqueue('Hello, world');
$qu->enqueue('Bye');

// var_dump($qu->dequeue());

// Case 3. Fixed Array

$array = new SplFixedArray(5);

foreach (range(0, 4) as $number) {
    $array[$number] = $number;
}

$array2 = new ArrayObject([ 'message' => 'Hello, world' ], ArrayObject::ARRAY_AS_PROPS);
var_dump($array2->message);

// var_dump($array);

// Case 4. Object Storage

$storage = new SplObjectStorage();

$o1 = new stdClass();
$o2 = new stdClass();

$storage->attach($o1, 'Hello, world');
$storage->attach($o2, 'Bye');

// var_dump($storage->contains($o1));
