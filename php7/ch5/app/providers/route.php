<?php

/**
 * Routes
 */

$routes = [];
foreach ([ 'web', 'api' ] as $route) {
    $routes = array_merge(require_once dirname(__DIR__, 2) . "/routes/{$route}.php", $routes);
}

return routes($routes) ?: reject(404);
