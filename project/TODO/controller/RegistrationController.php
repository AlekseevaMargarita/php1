<?php
require_once 'model/UserTodo.php';
require_once 'model/UserProvider.php';

$pdo = require 'db.php';

session_start();

$error = null;

//регистрация доступна только для неавторизованных пользователей
if (isset($_SESSION['user'])) {
    header('Location:/');
    die;
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $name = $_POST['name'] ?? null;

    $user = new UserTodo($username);
    $user->setName($name);

    $userProvider = new UserProvider($pdo);

    $result = $userProvider->registerUser($user, $password);

    if ($result) {
        $_SESSION['user'] = $user;
        header('Location: /');
        die();
    } else {
        $error = "Такой пользователь уже существует";
    }
}

require_once 'view/signup.php';
