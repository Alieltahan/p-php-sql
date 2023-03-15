<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'Body is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $charLen = strlen($_POST['body']);
        $errors['body'] = "Max characters allowed are 1,000 character only, you have inserted $charLen character.";
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}

require 'views/note-create.view.php';
