<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Router\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("$class.php");
});

$router = new Router();
$routes = require base_path('Router/routes.php');
//$config = require 'config.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


//$db = new Database($config['database']);
//$id = $_GET['id'];
//$query = "select * from posts where id = :id";
//$posts = $db->query($query,[':id'=> $id])->fetchAll();
//
//dd($posts);
