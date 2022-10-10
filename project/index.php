<?php

require_once 'User.php';
require_once 'Product.php';
require_once 'Task.php';
require_once 'TaskService.php';

$user = new User('Margo', 'margo@mail.ru');
//print_r($user);

/*$user->setAge(250);
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

$product = new Product('Товар1');
$product->setPrice(5000);

$product2 = new Product('Товар2');
$product2->setPrice(3000);

$product3 = new Product('Комплект');
$product3->setComponents($product);
$product3->setComponents($product2);
$product3->setPrice(3000);
print_r($product3);

$cart = new Cart();
$cart->addProduct($product, 1);
$cart->addProduct($product2, 2);
$cart->addProduct($product3, 1);
print_r($cart);
print_r($cart->getSum() . PHP_EOL);

$cart->addProduct($product, 1);
$cart->addProduct($product, 5);
print_r($cart);

$cart->reduceQuantity($product, 6);
print_r($cart->getProducts());

$cart->reduceQuantity($product2, 3);
print_r($cart->getProducts());

$cart->removeProduct($product3);
print_r($cart->getProducts());
