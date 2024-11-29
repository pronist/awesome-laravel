<?php

$root = dirname(__DIR__, 3);

/**
 * Directory
 */
$dir = dir($root . '/functions');

// while ($dirname = $dir->read()) {
//     var_dump($dirname);
// }

// $dir->rewind();
// while ($dirname = $dir->read()) {
//     var_dump($dirname);
// }

$dir->close();

$dir->handle = opendir($root . '/lang');

while ($dirname = $dir->read()) {
    var_dump($dirname);
}

$dir->close();
