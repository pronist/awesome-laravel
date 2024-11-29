<?php

function foo()
{
    /*
     * Get params number.
     */
    $argCount = func_num_args();
    switch ($argCount) {
        case 1:
            echo func_get_arg(0);
            break;
        default:
            var_dump(func_get_args());
    }
}

/*
 * Call.
 */
// call_user_func('foo', 'Hello, world', 10);

/*
 * Check function exists.
 */
function_exists('foo2');

/**
 * Get defined functions
 */
get_defined_functions();

/**
 * Call function when exiting script.
 */
register_shutdown_function(function () {
    echo 'Exit';
});
