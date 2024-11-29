<?php

/**
 * Read a line.
 */

echo $line = readline();

// Add history
readline_add_history($line);

// Clear
readline_clear_history();
