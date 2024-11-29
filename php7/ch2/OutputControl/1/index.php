<?php

/**
 * Output Control.
 */

ob_start();

echo 'Hello, world';
// $message = ob_get_contents();s

// -> Output stream
// ob_flush();

// ob_clean();

$message = ob_get_clean();
