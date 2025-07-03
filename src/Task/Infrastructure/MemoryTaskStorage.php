<?php
declare(strict_types=1);

namespace App\Task\Infrastructure;

use App\Task\Model\Task;
use App\Task\Model\TaskStorageInterface;

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

    /** @return Task[] */
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