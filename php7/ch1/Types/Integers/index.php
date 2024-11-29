<?php

/**
 * (Int) Integer Types.
 */

10; // -> Decimal
0777; // -> Octal
0xF; // -> Hexdecimal
0b0101; // -> Binary

/**
 * Type Casting.
 */
(int) 'Hello, world'; // -> 0
(int) '50x'; // -> 50
(int) true; // -> 1
(int) false; // -> 0
(int) null; // -> 0
