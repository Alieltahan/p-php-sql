<?php

/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
];

/**
 * @param $uri
 * @param $routes
 * @return void
 */
function routeToControllers($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else abort();
}

/**
 * @param int $code
 * @return void
 */
function abort(int $code = 404)
{
    http_response_code($code);
    require "views/$code.php";
    die();
}

routeToControllers($uri, $routes);