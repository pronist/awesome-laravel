<?php

/**
 * Timezone
 *
 * http://docs.php.net/manual/en/timezones.php
 */

// Set
date_default_timezone_set('Asia/Seoul');
// Get
date_default_timezone_get();

/**
 * Get time: Unix Timestamp
 */
$t = time();
// Case 1. localtime
localtime($t, true);
// Case 2. getdate
getdate($t);

/**
 * Timestamp format
 */
// Case 1. strftime
strftime('%d/%m/%Y %H:%M:%S', $t);
// Case 2. date
date('d/m/Y H:i:s', $t);

/**
 * Make a timestamp
 */
$timestamp = mktime('1', '15', '30');

/**
 * Parsing String time.
 */
// strptime(strftime('%d/%m/%Y %H:%M:%S', $t), '%d/%m/%Y %H:%M:%S');

/**
 * String to time
 */
$timestamp = strtotime('+2 days');

/**
 * Script time execution time check.
 */
$stime = microtime(true);

sleep(1);

echo microtime(true) - $stime;
