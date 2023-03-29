<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\Database;

use Core\App;

$db = App::resolve(Database::class);

$currentUser = 1;
$heading = 'Note';
if (!array_key_exists('id', $_GET)) {
    header('location: /notes');
    exit('Checking Exit');
}
$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetchOrFail();
authorize($note['user_id'] === $currentUser);

view("notes/show", [
    'heading' => 'Note',
    'note' => $note
]);
