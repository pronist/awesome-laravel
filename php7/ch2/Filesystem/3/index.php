<?php

/*
 * get File info from
 */
$path = dirname(__DIR__, 3) . '/README.md';

// Case 1. from File handler
$fh = fopen($path, 'r');
fstat($fh);

// Case 2. from File name
stat($path);

/*
 * get File info Detail
 */
// Size
filesize($path);
// Modification time
filemtime($path);

/*
 * Check file type
 */
// -> true
is_file($path);
