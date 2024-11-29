<?php

/**
 * DataTime
 */

$dt = new DateTime('now', new DateTimeZone('Asia/Seoul'));
// $dt = DateTime::createFromFormat('Y/m/d', '2020/02/15', new DateTimeZone('Asia/Seoul'));
$dt->modify('+2 days');
$dt->modify('+2 days');

// var_dump($dt->format('h:i:s Y/m/d'));

/**
 * DateTimeZone
 */
$dz = new DateTimeZone('Asia/Seoul');
// var_dump(DateTimeZone::listIdentifiers(), $dz->getLocation(), $dz->getName());

/**
 * DateInterval
 */
$dt2 = new DateTime('now', new DateTimeZone('Asia/Seoul'));
// var_dump($dt2->diff($dt));

$di = new DateInterval('P1Y2M2D');
$di2 = DateInterval::createFromDateString('+2 days');

// var_dump($di2);

/**
 * DatePeriod
 */
$dt3 = new DateTime('2019-12-31');
$dt4 = new DateTime('2020-12-31');
$di3 = DateInterval::createFromDateString('+5 days');

$dp = new DatePeriod($dt3, $di3, $dt4);
var_dump($dp);
