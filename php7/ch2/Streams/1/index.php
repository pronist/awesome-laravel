<?php

/**
 * Stream context
 *
 * http://docs.php.net/manual/en/context.php
 */

$context = stream_context_create();

stream_context_set_option($context, [
    'http' => [
        'method' => 'GET'
    ]
]);

file_get_contents('http://example.com', false, $context);

/**
 * Stream Filter
 */
stream_get_filters();

// $fh = fopen("http://example.com", 'r');
$fh = fopen(dirname(__DIR__, 3) . '/README.md', 'r');

// Add
stream_filter_append($fh, 'string.toupper');

// Get
// fread($fh, 2048);
stream_get_contents($fh);

/**
 * Stream Wrappers
 *
 * http://docs.php.net/manual/en/wrappers.php
 */
stream_get_wrappers();

// $fh = fopen('php://output', 'w');
// fwrite($fh, 'Hello, world');
file_put_contents('php://output', 'Hello, world');
