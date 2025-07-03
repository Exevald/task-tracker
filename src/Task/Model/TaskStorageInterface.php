<?php
declare(strict_types=1);

namespace App\Task\Model;

interface TaskStorageInterface
{
    /**
     * @return Task[]
     */
    public function getTasks(): array;

    public function addTask(Task $task): void;

    public function getNextTaskId(): int;
}