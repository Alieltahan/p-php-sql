<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a password.';
}

if (!empty($errors)) {
    view('registration/create', [
        'errors' => $errors
    ]);
    return;
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {
   if(password_verify($password, $user['password'])){
       login($user);

       header('location: /');
       exit();
   }
}


view('session/create', [
    'email' => 'No matching account found for that email address and password'
]);
