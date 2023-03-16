<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\Validator;

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
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

