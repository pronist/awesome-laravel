<?php

/**
 * Change a directory.
 */

chdir(__DIR__);

/*
 * Get current working directory
 */
getcwd();

/**
 * Reading a directory
 */
$files = scandir(__DIR__ . '/../..');

/**
 * Directory Handling
 */
// Open
$dir = opendir(__DIR__ . '/../..');
// Read
while ($name = readdir($dir)) {
}
// Reset
rewinddir($dir);
// Close
closedir($dir);
