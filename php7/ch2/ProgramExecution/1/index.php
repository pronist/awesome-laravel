<?php

/**
 * Command Execution.
 */

// -> String
// exec('dir', $output);
// -> String
// echo shell_exec('dir');
// -> Output stream
// system('dir');
// -> String
// echo `dir`;
// -> Output stream (raw)
// passthru('dir');

/**
 * Escaping.
 */
// -> "echo 'Hello, world';"
escapeshellarg('echo \'Hello, world\';');
// -> php -r
escapeshellcmd('php -r');
