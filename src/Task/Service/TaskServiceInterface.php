<?php

namespace App\Task\Service;

use App\Task\Model\Task;

interface TaskServiceInterface
{
    public function addTask(string $title): int;

    public function getTask(int $taskId): ?Task;

    /**
     * @return Task[]
     */
    public function getTasks(): array;
}