<?php

/**
 * Set assert options
 *
 * PHP.ini
 *
 * zend.assertions = 1
 */

// ini_set('zend.assertions', 1);

// Active
assert_options(ASSERT_ACTIVE, true);
// Stop testing on failure
assert_options(ASSERT_BAIL, false);
// PHP Trace
assert_options(ASSERT_WARNING, true);
// Callback
assert_options(ASSERT_CALLBACK, 'assertFailure');

function assertFailure(...$args)
{
    var_dump($args);
}

/**
 * Assert
 */
assert(false, __LINE__);
