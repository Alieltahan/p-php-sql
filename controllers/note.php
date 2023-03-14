<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUser = 1;


$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetchOrFail();


authorize($note['user_id'] === $currentUser);

require "views/note.view.php";
