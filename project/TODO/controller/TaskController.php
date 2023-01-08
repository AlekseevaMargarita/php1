<?php

require_once 'model/UserTodo.php';
require_once 'model/TaskTodo.php';
require_once 'model/TaskProvider.php';

session_start();

$username = null;
$user = null;
$error = null;
$checked = null;
$taskProvider = new TaskProvider();

//Проверка, авторизован ли пользователь (получение имени из сессии)
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
} else {
    header('Location: /?controller=security');
    die();
}

//Реакция на радиокнопки (запомнить фильтр)
if (isset($_POST['list']) && $_POST['list'] === 'undone') {
    $_SESSION['list'] = 'undone';
}

if (isset($_POST['list']) && $_POST['list'] === 'all') {
    $_SESSION['list'] = 'all';
}

//Получение списка задач (зависит от фильтра), отображение соотвествующей радиокнопки
if (isset($_SESSION['list']) && $_SESSION['list'] === 'undone') {
    $tasks = $taskProvider->getUndoneList();
    $checked = false;
} else {
    $tasks = $taskProvider->getTasksList();
    $checked = true;
}

//Добавление задачи
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    //получение описания задачи из формы, обработка
    $description = htmlspecialchars(strip_tags(stripslashes(trim($_POST['description']))));
    //если описание пустое, ошибка
    //иначе получаем пользователя, задачу, добавляем задачу в сессию через провайдер и обновляем страницу
    if ($description === '') {
        $error = "Вы не указали описание задачи";
    } else {
        $user = $_SESSION['user'];
        $task = new TaskTodo($user, $description);
        $taskProvider->addTask($task);
        header('Location: /?controller=tasks');
        die();
    }
}

//Удаление задачи
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $taskProvider->deleteTask($_GET['id']);
    header('Location: /?controller=tasks');
    die();
}

//Отметка о выполнении
if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $taskProvider->completeTask($_GET['id']);
    header('Location: /?controller=tasks');
    die();
}

require_once 'view/tasks.php';