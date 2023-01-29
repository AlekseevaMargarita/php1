<?php

class UserTodo
{
    private string $id;
    private string $username;
    private string $name;
    private string $dateReg = '';

    public function __construct(string $username)
    {
        $this->username = $username;
        if ($this->dateReg === '') {
            $this->dateReg = date('Y-m-d H:i:s');
        }
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
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

    public function getDateReg(): string
    {
        return $this->dateReg;
    }

}