<?php

/**
 * Generator
 */
function gen()
{
    yield 1;
    yield 2;
    yield 3;
}

$gen = gen();

// var_dump($gen->current());
// $gen->next();
// var_dump($gen->current());

// foreach ($gen as $number)
// {
//     var_dump($number);
// }

function gen2()
{
    yield 1;
    yield from gen();
    yield 2;
}

// foreach (gen2() as $number) {
//     var_dump($number);
// }

function gen3()
{
    yield 'message' => 'Hello, world';
}

// foreach (gen3() as $key => $value) {
//     var_dump($key, $value);
// }

function gen4()
{
    $data = yield;
    yield $data;
}

$gen4 = gen4();

// var_dump($gen4->current());
// var_dump($gen4->send('Hello, world'));

function __range($start, $end, $step = 1)
{
    for ($i = 0; $i <= $end; $i += $step) {
        yield $i;
    }
}

$s = microtime(true);

// foreach (__range(0, 100000) as $number) {}
foreach (range(0, 100000) as $number) {
}

// 0.40912079811096,    443408 // -> Generator

// 0.0055599212646484,  6698208 // -> built-in function
var_dump(microtime(true) - $s, memory_get_peak_usage());
