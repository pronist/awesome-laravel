<?php

/**
 * SplFileObject
 */

$file = new SplFileObject(dirname(__DIR__, 3) . '/README.md');
// var_dump($file->fread($file->getSize()));

/**
 * SplFileInfo
 */
$fileinfo = $file->getFileInfo();
var_dump($fileinfo->getBasename(), $fileinfo->isDir());
