<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */
const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\',DIRECTORY_SEPARATOR, $class);
    require base_path("$class.php");
});

require base_path('router/router.php');
$config = require 'config.php';


//$db = new Database($config['database']);
//$id = $_GET['id'];
//$query = "select * from posts where id = :id";
//$posts = $db->query($query,[':id'=> $id])->fetchAll();
//
//dd($posts);
