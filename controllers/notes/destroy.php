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

$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->fetchOrFail();

authorize($note['user_id'] === $currentUser);

$db->query('DELETE from notes where id = :id', [
    'id' => $_POST['id']
]);

header('location: /notes');
exit();
