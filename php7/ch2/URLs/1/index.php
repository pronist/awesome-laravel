<?php

/**
 * base64 Encode/Decode
 */

// Encode
$base64Encoded = base64_encode('Hello, world');
// Decode
base64_decode($base64Encoded);

/*
 * (as Http client) Get Headers
 */
get_headers('http://example.com');

/*
 * (as Http client) Get meta tags
 */
get_meta_tags('http://example.com');

/**
 * Build a query string
 */

// http_build_query
$queryString = http_build_query([
    'lang'      => 'php',
    'message'   => 'Hello, world'
]);

/*
 * parse URL
 */
parse_url('http://example.com?' . $queryString);

/**
 * URL Encode/Decode.
 */
// Encode
$urlEncoded = urlencode('안녕하세요');
// Decode
echo urldecode($urlEncoded);
