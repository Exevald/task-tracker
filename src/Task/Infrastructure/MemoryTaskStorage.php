<?php

require_once __DIR__ . '/../Model/TaskStorageInterface.php';
require_once __DIR__ . '/../Model/Task.php';

class MemoryTaskStorage implements TaskStorageInterface
{
    /**
     * @var Task[]
     */
    private array $tasks;

    public function __construct()
    {
        $this->tasks = [];
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function getNextTaskId(): int
    {
        if (empty($this->tasks)) {
            return 0;
        }
        return $this->tasks[count($this->tasks) - 1]->getId() + 1;
    }
}