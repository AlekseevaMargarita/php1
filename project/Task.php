<?php

require_once 'User.php';

class Task
{
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone = false;
    private User $owner;
    private array $comments = [];

    /**
     * @param User $owner
     */
    public function __construct(User $owner)
    {
        $this->owner = $owner;
        $this->dateCreated = new DateTime();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
        $this->dateUpdated = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * @return DateTime
     */
    public function getDateDone(): DateTime
    {
        return $this->dateDone;
    }

    ///**
    // * @param DateTime $dateDone
    // */
    //private function setDateDone(): void
    //{
    //    $this->dateDone = new DateTime();
    //}

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return bool
     */
    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    /**
     * @param bool $isDone
     */
    private function isDone(): void
    {
        $this->isDone = true;
    }

    /**
     * @return User
     */
    public function getOwner(): User
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

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param array $comment
     */
    public function setComments(Comment $comment): void
    {
        $this->comments[] = $comment;
    }

}