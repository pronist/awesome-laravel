<?php

namespace Eclair\Http;

class Request
{
    /**
     * Get request method
     *
     * @return string
     */
    public static function getMethod()
    {
        return filter_input(INPUT_POST, '_method') ?: $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get pathinfo
     *
     * @return string
     */
    public static function getPath()
    {
        return $_SERVER['PATH_INFO'] ?? '/';
    }
}
