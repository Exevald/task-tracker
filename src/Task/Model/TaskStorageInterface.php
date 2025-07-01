<?php

require_once __DIR__ . '/Task.php';

interface TaskStorageInterface
{
    /**
     * @return Task[]
     */
    public function getTasks(): array;

    public function addTask(Task $task): void;

    public function getNextTaskId(): int;
}