<?php

namespace Eclair\Routing;

use Eclair\Routing\RequestContext;
use Eclair\Http\Request;

class Route
{
    /**
     * @var RequestContext[] $contexts
     */
    private static $contexts = [];

    /**
     * Add a route
     *
     * @param string $method
     * @param string $path
     * @param callback $controller
     */
    public static function add($method, $path, $handler, $middlewares = [])
    {
        self::$contexts[] = new RequestContext($method, $path, $handler, $middlewares);
    }

    /**
     * Run routes
     *
     * @return void
     */
    public static function run()
    {
        foreach (self::$contexts as $context) {
            if ($context->method === strtolower(Request::getMethod()) && is_array($urlParams = $context->match(Request::getPath()))) {
                if ($context->runMiddlewares()) {
                    return call_user_func($context->handler, ...$urlParams);
                }
                return false;
            }
        }
    }
}
