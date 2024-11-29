<?php

/**
 * File Downloads.
 */

// $path = filter_input(INPUT_GET, 'path', FILTER_SANITIZE_STRING);
$path = '../../../README.md';
$filepath = realpath(dirname(__DIR__) . '/uploads/' . basename($path));

if (file_exists($filepath)) {
    $pathinfo = pathinfo($filepath);
    $accepts = [
        'md'
    ];
    if (in_array(strtolower($pathinfo['extension']), $accepts)) {
        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($filepath));

        readfile($filepath);
    }
}
