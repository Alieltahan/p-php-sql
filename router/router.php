<?php

/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

/**
 * @param $uri
 * @param $routes
 * @return void
 */
function routeToControllers($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else abort();
}

/**
 * @param int $code
 * @return void
 */
function abort(int $code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require 'routes.php';

routeToControllers($uri, $routes);
