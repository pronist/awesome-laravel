<?php

/**
 * Browser Cache
 */
$file = __DIR__ . '/index.php';

$lastModifed = filemtime($file);
$etag = md5_file($file);

header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $lastModifed) . 'GMT');
header('Etag: ' . $etag);

if (strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) === $lastModifed) {
    if ($_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
        header('HTTP/1.1 304 Not Modified');
        exit;
    }
} else {
    include 'HelloWorld.php';
}
