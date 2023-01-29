<?php

require_once 'UserTodo.php';

class TaskTodo
{
    private int $id;
    private ?string $description;
    //или ?string?
    private string $dateCreated = '';
    private ?string $dateUpdated;
    private ?string $dateDone;
    private int $priority;
    private bool $isDone = false;
    private UserTodo $owner;
//    private array $comments = [];

    public function __construct(UserTodo $owner, string $description = null)
    {
        $this->owner = $owner;
        $this->description = $description;
        if ($this->dateCreated === '') {
            $this->dateCreated = date('Y-m-d H:i:s');
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    public function getDateUpdated(): string
    {
        return $this->dateUpdated;
    }

    public function getDateDone(): string
    {
        return $this->dateDone;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function getOwner(): UserTodo
    {
        return $this->owner;
    }

/*    public function getComments(): array
    {
        return $this->comments;
    }*/

/*    public function setComments(Comment $comment): void
    {
        $this->comments[] = $comment;
    }*/

}