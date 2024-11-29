<?php

/**
 * from Path
 */

// -> index.php
basename(__FILE__);
// -> D:\Development\php\phplec\functions\Filesystem
dirname(__FILE__, 2);

/*
 * to Absolute Path
 */
realpath('.');

/*
 * Get path info
 */
pathinfo(__FILE__);

/*
 * Find Files
 */
// Glob
glob('./*.php');

/**
 * File name check
 */
fnmatch('*.php', 'index.php');

/**
 * File(Directory) Control
 */
// Copy
copy('./index.php', './file_functions.php');
// Make a directory
mkdir('./sessions');
// Remove a file
unlink('./file_functions.php');
// Remove a directory
rmdir('./sessions');
