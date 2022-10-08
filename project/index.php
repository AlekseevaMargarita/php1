<?php

require_once 'User.php';
require_once 'Product.php';

$user = new User('Margo', 'amv1102@mail.ru');
var_dump($user);

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
print_r($user->getCart()->getProducts());



