<?php

require_once 'model/UserTodo.php';

session_start();

$pageHeader = 'TODO';

$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
}

require_once 'view/home.php';