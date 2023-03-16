<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->fetchOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/edit", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);
