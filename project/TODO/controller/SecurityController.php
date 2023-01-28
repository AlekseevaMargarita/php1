<?php

require_once 'model/UserProvider.php';
$pdo = require 'db.php';

session_start();

$error = null;

//выход
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    header('Location: /');
    die();
}

//авторизация по логину и паролю
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    $userProvider = new UserProvider($pdo);

    $user = $userProvider->getUserByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = "Пользователь с указанными учетными данными не найден";
    } else {
        $_SESSION['user'] = $user;
        header('Location: /');
        die();
    }
}

require_once 'view/signin.php';

