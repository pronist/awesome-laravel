<?php

/**
 * Filter.
 */

filter_var('pronist@naver.com', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);

filter_var('Hello, world', FILTER_CALLBACK, [
    'options' => function ($value) {
        return $value;
    }
]);

/*
 * Fix.
 */
filter_var('<html><head></head></html>', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

/*
 * Has.
 */
filter_has_var(INPUT_SERVER, 'REMOTE_ADDR');

/*
 * Request.
 */

// $_SERVER
filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
