<?php

/**
 * Http Header.
 */

// Set
header('X-Header: Hello, world');
// Remove
header_remove('X-Header');

/*
 * HTTP Response Code
 */
// Case 1. http_response_code
http_response_code(404);
// Case 2. header
header('HTTP/1.1 404 Not Found');
