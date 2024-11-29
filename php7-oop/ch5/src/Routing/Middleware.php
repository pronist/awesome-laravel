<?php

namespace Eclair\Routing;

abstract class Middleware
{
    /**
     * Middleware main logic
     */
    abstract public static function process();
}
