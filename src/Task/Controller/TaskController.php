<?php
declare(strict_types=1);

require_once __DIR__ . '/../Model/Task.php';
require_once __DIR__ . '/../Model/TaskStorageInterface.php';

class TaskController
{
    private TaskStorageInterface $taskStorage;

    public function __construct(
        TaskStorageInterface $taskStorage
    )
    {
        $this->taskStorage = $taskStorage;
    }

    public function addTask(array $request): void
    {
        $taskTitle = $request['title'] ?? null;
        if (!$taskTitle) {
            return;
        }
        $id = $this->taskStorage->getNextTaskId();
        $task = new Task($id, $taskTitle);
        $this->taskStorage->addTask($task);

        $this->index();
    }

    public function index(): void
    {
        $tasks = $this->taskStorage->getTasks();
        require_once __DIR__ . '/../View/tasks_list.php';
    }
}