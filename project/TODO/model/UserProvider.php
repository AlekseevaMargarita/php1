<?php

require_once 'UserTodo.php';
class UserProvider
{
    private array $accounts = [
        'geekbrains' => 'password123'
    ];

    public function getUserByUsernameAndPassword(string $username, string $password): ?UserTodo
    {
        $expectedPassword = $this->accounts[$username] ?? null;
        if ($expectedPassword === $password) {
            return new UserTodo($username);
        }

        return null;
    }

}