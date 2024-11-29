<?php

/**
 * Absolute
 */

abs(-1); // -> 1

/*
 * Floating Point
 */
ceil(6.7); // -> 7
floor(6.2); // -> 6
round(6.56, 1); //-> 6.6

/*
 * hex -> dec
 */
$hex = hexdec('F'); // -> 15

/*
 * Max, Min
 */
max([ 1,2,3,4,5 ]); // -> 5
min([ 1,2,3,4,5 ]); // -> 1

/*
 * a^b
 */
// 2 ** 4;
pow(2, 4); // -> 16

/*
 * Create a random int
 */
rand(0, 5); // -> 0 ~ 5

/*
 * Square root
 */
sqrt(16); // -> 4
