<?php
//код создания таблиц, запускается из командной строки
include 'model/UserTodo.php';
include 'model/UserProvider.php';

//создаем PDO объект
$pdo = require 'db.php';

//создаем таблицу с пользователями
$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(150),
    password VARCHAR(100) NOT NULL 
)');

//создаем первого пользователя
$user = new UserTodo('geekbrains');
$user->setName('Geekbrains PHP');

//передаем PDO в UserProvider для работы с БД
$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, 'password123');