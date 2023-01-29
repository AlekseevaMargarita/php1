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
    password VARCHAR(100) NOT NULL, 
    dateReg DATE NOT NULL 
)');

//создаем первого пользователя
$user = new UserTodo('geekbrains');
$user->setName('Geekbrains PHP');

//передаем PDO в UserProvider для работы с БД
$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, 'password123');

//создаем таблицу с задачами
//странные поля для sqlite указаны в методичке
$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    description VARCHAR(500) NOT NULL,
    dateCreated VARCHAR (50) NOT NULL,
    dateUpdated VARCHAR (50),
    dateDone VARCHAR(50),
    priority INTEGER DEFAULT 3,
    isDone TINYINT DEFAULT false,
    owner INTEGER NOT NULL,
    FOREIGN KEY (owner) REFERENCES users(id)
)'
);