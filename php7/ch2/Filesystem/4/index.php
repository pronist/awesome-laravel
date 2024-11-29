<?php

/*
 * Hard link
 */
link(__FILE__, './file_functions.php');

/*
 * Symlink
 */
symlink(__FILE__, './sym_file_functions.php');
// -> D:\Development\php\phplec\functions\Filesystem\4\index.php
readlink('./sym_file_functions.php');
