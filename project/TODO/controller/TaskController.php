<?php

require_once 'model/UserTodo.php';

session_start();

$username = null;

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
} else {
    header('Location: /?controller=security');
    die();
}

$tasks = [
    "Погулять с собакой",
    "Сходить в магазин"
];

require_once 'view/tasks.php';