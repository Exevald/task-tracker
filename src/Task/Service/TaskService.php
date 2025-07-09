<?php

namespace App\Task\Service;

use App\Task\Model\Task;
use App\Task\Model\TaskStorageInterface;

class TaskService implements TaskServiceInterface
{
    public function __construct(public TaskStorageInterface $taskStorage)
    {
    }

    public function addTask(string $title): int
    {
        $id = $this->taskStorage->getNextTaskId();
        $task = new Task($id, $title);
        $this->taskStorage->addTask($task);

        return $id;
    }

    public function getTask(int $taskId): ?Task
    {
        $tasks = $this->taskStorage->getTasks();
        foreach ($tasks as $task) {
            if ($task->getId() === $taskId) {
                return $task;
            }
        }
        return null;
    }

    public function getTasks(): array
    {
        return $this->taskStorage->getTasks();
    }
}