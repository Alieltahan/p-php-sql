<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

$config = require('config.php');

$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = 1')->getAll();

require "views/notes/index.view.php";
