<?php
require_once 'UserTodo.php';

class UserProvider
{
    //для работы с БД необходим PDO
    private PDO $pdo;

    //получаем PDO при создании UserProvider
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //регистрация пользователя
    public function registerUser (UserTODO $user, string $plainPassword): bool
    {
        //подготовка запроса
        $statement = $this->pdo->prepare (
            'INSERT INTO users (username, name, password, dateReg) VALUES (:username, :name, :password, :dateReg)'
        );
        //выполнение запроса с массивом аргументов
        return $statement->execute([
            'username' => $user->getUsername(),
            'name' => $user->getName(),
            'password' => md5($plainPassword),
            'dateReg' => $user->getDateReg()
        ]);
    }

    //получение пользователя из БД по логину и паролю, возвращается объект или null
    public function getUserByUsernameAndPassword(string $username, string $password): ?UserTodo
    {
        //подготовка запроса
        $statement = $this->pdo->prepare(
            'SELECT id, username, name, dateReg FROM users WHERE username = :username AND password = :password LIMIT 1'
        );
        //выполнение запроса с массивом аргументов,
        $statement->execute([
            'username' => $username,
            'password' => md5($password)
        ]);
        //установить режим выборки по имени класса | вызвать конструктор до установки свойств, имя класса
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, UserTodo::class);

        //получаем и возвращаем пользователя или null
        return $statement->fetch() ?: null;
    }

}