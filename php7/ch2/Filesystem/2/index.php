<?php

/**
 * File handling
 */

$path = dirname(__DIR__, 3) . '/README.md';

$fh = fopen($path, 'r');

/*
 * File Reading
 */

// Case 1. functions

// -> string
file_get_contents($path);
// -> array
file($path);
// -> output stream
// readfile($path);

// -> output stream
// fpassthru($fh);
// -> string
fread($fh, filesize($path));

// Case 2. with Loop

while (($line = fgets($fh)) && !feof($fh)) {
}

/**
 * File pointer
 */
// Set
fseek($fh, 0, SEEK_SET);
// Get
ftell($fh);
// is ended
feof($fh);
// Reset
rewind($fh);

/**
 * File Writing
 */
$path = './HelloWorld.txt';
$fh = fopen($path, 'w');

// Case 1. file_put_contents

file_put_contents($path, 'Hello, world');

// Case 2. file handler

rewind($fh);

// -> output stream
fwrite($fh, 'Hello, world');
// -> output stream (force)
fflush($fh);

/**
 * File slice
 */
$fh = fopen($path, 'r+');
ftruncate($fh, rand(1, filesize($path)));

/*
 * File handler close
 */
fclose($fh);
