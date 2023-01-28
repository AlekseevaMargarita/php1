<?php

class UserTodo
{
    private string $username;
    private string $name;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setName($name): string
    {
        return $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

}