<?php

/**
 * cURL Handling
 */

// Init
$ch = curl_init();

// Set Options (GET)

$queryString = http_build_query([
    'message' => 'Hello, world'
]);

curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080/?' . $queryString);

// Excution
// curl_exec($ch);

// Reset
curl_reset($ch);

// Set Options (POST)

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'message' => 'Hello, world'
]);
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080');

// Exectuion
curl_exec($ch);

// Close
curl_close($ch);
