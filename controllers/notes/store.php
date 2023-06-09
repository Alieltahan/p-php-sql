<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\Response;

use Core\Validator;

use Core\Database;

use Core\App;

$db = App::resolve(Database::class);

$heading = 'Create Note';
$errors = [];

if (!Validator::string($_POST['body'], Response::MIN_CHAR, Response::MAX_CHAR)) {
    $errors['body'] = 'Note characters should be more than 1 character and less than 1,000 character';
}

if (empty($errors)) {
    $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
    header('location: /notes');
die();
}
