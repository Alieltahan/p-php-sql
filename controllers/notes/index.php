<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = 1')->getAll();

view("notes/index", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
