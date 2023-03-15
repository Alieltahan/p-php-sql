<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUser = 1;
$heading = 'Note';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetchOrFail();

    authorize($note['user_id'] === $currentUser);

    $db->query('DELETE from notes where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
    exit();
} else {
    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetchOrFail();

    authorize($note['user_id'] === $currentUser);

    view("notes/show", [
        'heading' => 'Note',
        'note' => $note
    ]);
}
