<?php

/**
 * One way Process Handling.
 */

$ph = popen('php ' . dirname(__DIR__, 3) . '/lang/BasicSyntax/HelloWorld/index.php', 'w');

// echo stream_get_contents($ph);

pclose($ph);

/**
 * Two way Process Handling.
 */

$ph = proc_open(
    'php ./Readline/1/index.php',
    [
        0 => ['pipe', 'r'], // READ
        1 => ['pipe', 'w'], // WRITE
        2 => ['file', __DIR__ . '/logs/log.log', 'a'] // ERR
    ],
    $pipes,
    dirname(__DIR__, 2)
);

[ $readStream, $writeStream, ] = $pipes;

fwrite($readStream, 'Hello, world');
fclose($readStream);

stream_get_contents($writeStream);
fclose($writeStream);

// Terminate
proc_terminate($ph);
// Close Process
proc_close($ph);
