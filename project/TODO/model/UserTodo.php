<?php
include_once "model/Model.php";

//наследование, расширение класса Model
class UserTodo extends Model
{
    private ?string $username;
    private ?string $name;
    private string $dateReg = '';

    public function __construct(int $id = null, string $username = null)
    {
        parent::__construct($id);
        $this->username = $username;
        if ($this->dateReg === '') {
            $this->dateReg = date('Y-m-d H:i:s');
        }
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
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