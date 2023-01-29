<?php
require_once 'TaskTodo.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //метод для получения списка задач из БД
    public function getTasksList(UserTodo $user): array
    {
        $statement = $this->pdo->prepare(
        'SELECT id, description, dateCreated, dateUpdated, dateDone, priority, isDone 
                FROM tasks 
                WHERE owner = :userId'
        );
        $statement->execute([
            'userId' => $user->getId()
        ]);
       return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, TaskTodo::class, [$user]);
    }
    //метод для получения списа невыполненных задач из БД
    public function getUndoneList(UserTodo $user): array
    {
        $statement = $this->pdo->prepare(
            'SELECT id, description, dateCreated, dateUpdated, dateDone, priority, isDone 
                    FROM tasks 
                    WHERE owner = :userId 
                      AND isDone != true'
        );
        $statement->execute([
            'userId' => $user->getId()
        ]);
        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, TaskTodo::class, [$user]);
    }

    //метод для добавления задачи в БД
    public function addTask(TaskTodo $task): bool
    {
        //подготовка запроса. Можно изменить поля в случае изменения формы добавления задачи. Пока так.
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (description, dateCreated, isDone, owner) 
                    VALUES (:description, :dateCreated, :isDone, :owner)'
        );
        //выполнение запроса
        return $statement->execute([
            'description' => $task->getDescription(),
            'dateCreated' => $task->getDateCreated(),
            'isDone' => $task->getIsDone(),
            'owner' => $task->getOwner()->getId()
        ]);
    }

    //метод для удаления задачи
    public function deleteTask(string $id): bool
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = ?'
        );
        return $statement->execute([$id]);
    }

    //метод для отметки выполнения задачи
    public function completeTask(string $id): bool
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks
                    SET dateUpdated = :date, dateDone = :date, isDone = true
                    WHERE id = :id'
        );
        return $statement->execute([
            'date' => date('Y-m-d H:i:s'),
            'id' => $id
        ]);
    }

}