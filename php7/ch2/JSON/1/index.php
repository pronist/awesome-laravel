<?php

/**
 * JSON Encode/Decode
 */

// Encode
$jsonEncoded = json_encode([
    'message' => 'Hello, world'
]);
// Decode
json_decode($jsonEncoded, true);
