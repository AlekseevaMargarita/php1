<?php

require_once 'TaskTodo.php';

class TaskProvider
{
    private array $tasks;

    public function __construct()
    {
        //при создании хранилища читаем задачи из сессии
        $this->tasks = $_SESSION['tasks'] ?? [];
    }

    //метод для получения списка задач из сессии
    public function getTasksList(): array
    {
        return $this->tasks;
    }
    //метод для получения списа невыполненных задач
    public function getUndoneList(): array
    {
        $tasks = $this->getTasksList();
        $undoneList = [];
        foreach ($tasks as $task) {
            if (!$task->getIsDone()) {
                $undoneList[] = $task;
            }
        }
        return $undoneList;
    }

    //метод для добавления задачи
    public function addTask(TaskTodo $task): void
    {
        $_SESSION['tasks'][] = $task;
    }

    //метод для удаления задачи
    public function deleteTask(string $id): void
    {
        foreach ($_SESSION['tasks'] as $key => $task) {
            if ($task->getId() === $id) {
                unset($_SESSION['tasks'][$key]);
            }
        }
    }

    //метод для отметки выполнения задачи
    public function completeTask(string $id): void
    {
        foreach ($_SESSION['tasks'] as $key => $task) {
            if ($task->getId() === $id) {
                $_SESSION['tasks'][$key]->markAsDone();
            }
        }

    }

}