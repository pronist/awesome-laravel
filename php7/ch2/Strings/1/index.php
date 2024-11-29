<?php

/**
 * Add slashes at Quotes.
 */

// Add
$slashe = addslashes("'");
// Remove
stripslashes($slashe);

/**
 * Binary to Hex
 */
$bytes = random_bytes(32);

// bin -> hex
$hex = bin2hex($bytes);
// hex -> bin
hex2bin($hex);

/*
 * One way hash (Encryption)
 *
 * sha1, md5 Not recommended
 */
crypt('Hello, world', 'secret');

/**
 * Split, Join
 */
$url = 'http://example.com';

// Split
$exp = explode('//', $url);
// Join
implode('//', $exp);

/**
 * HTML entities
 */
$html = <<<'HTML'
<html>
    <body>
        <h1>Hello, world</h1>
    </body>
</html>
HTML;

// Encode
// $encoded = htmlentities($html);
$encoded = htmlspecialchars($html);

// Decode
// html_entity_decode($encoded);
htmlspecialchars_decode($encoded);

/*
 * Strip HTML Tags
 */
strip_tags($html);

/*
 * \n -> <br> tag
 */
nl2br("Hello,\nworld");

/*
 * Char
 */
// char -> num
ord('A'); // -> 65
// num -> char
chr(65); // -> A

/**
 * Parse Query string
 */
$qs = 'lang=php&addr=127.0.0.1';
parse_str($qs, $arr);

/*
 * Number Format
 */
number_format(123456789);

/**
 * Case
 */
// Upper
strtoupper('Hello, world');
// Lower
strtolower('HELLO, WORLD');

/*
 * Remove spaces
 */
trim('Hello, world');

/*
 * Replace
 */
echo strtr('Hello, world', [
    'Hello, world' => '안녕하세요'
]);
