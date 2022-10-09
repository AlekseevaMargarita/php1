<?php

require_once 'User.php';
require_once 'Product.php';
require_once 'Task.php';
require_once 'TaskService.php';

$user = new User('Margo', 'margo@mail.ru');
/*var_dump($user);

$user->setAge(250);
var_dump($user->getAge());

$user->setAge(25);
var_dump($user->getAge());

$user->setEmail('margo@margo.ru');
var_dump($user->getEmail());

$iPhone = new Product();
$iPhone->setName('iPhone12');
$iPhone->setPrice(80000);

$user->getCart()->addProduct($iPhone, 2);
print_r($user->getCart()->getProducts());*/

$task = new Task($user);
print_r($task);

$task->setDescription('Описание задачи');
print_r($task);

$task->markAsDone();
print_r($task);

TaskService::addComment($user, $task, 'Комментарий');
TaskService::addComment($user, $task, 'Комментарий 2');
print_r($task);