<?php

/**
 * Sub String
 */

strstr('http://example.com', '//');

/*
 * Token
 */
strtok('http://example.com', '//');

/*
 * Slice
 */
substr('Hello, world', 7);

/*
 * Compare
 */
substr_compare('Hello, world', 'world', -5);

/*
 * Replace
 */
substr_replace('Hello, world', 'Hi', 0, 5);

/*
 * Count
 */
substr_count('Hello, world', 'l', 0);

/*
 * Wrapping
 */
echo wordwrap('Hello, world', 5);
