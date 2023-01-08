<?php

require_once 'UserTodo.php';

class TaskTodo
{
    private string $description;
    private string $id;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone = false;
    private UserTodo $owner;
//    private array $comments = [];

    public function __construct(UserTodo $owner, string $description)
    {
        $this->owner = $owner;
        $this->id = uniqid('task');
        $this->dateCreated = new DateTime();
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
        $this->dateUpdated = new DateTime();
    }

    public function getId(): string{
        return $this->id;
    }
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    public function getDateDone(): DateTime
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

    private function isDone(): void
    {
        $this->isDone = true;
    }

    public function getOwner(): UserTodo
    {
        return $this->owner;
    }

    public function markAsDone()
    {
        $this->isDone();
        //$this->setDateDone();
        $this->dateDone = new DateTime();
        $this->dateUpdated = new DateTime();
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