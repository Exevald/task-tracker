<?php
declare(strict_types=1);

namespace App\Task\Controller;

use App\Task\Model\Task;
use App\Task\Model\TaskStorageInterface;

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

        $this->getTask($task->getId());
    }

    public function getTask(int $taskId): void
    {
        $tasks = $this->taskStorage->getTasks();

        foreach ($tasks as $task) {
            if ($task->getId() === $taskId) {
                $this->currentTask($task);
                return;
            }
        }

        $this->index();
    }

    public function index(): void
    {
        $tasks = $this->taskStorage->getTasks();
        require_once __DIR__ . '/../View/tasks_list.php';
    }

    public function currentTask(Task $task): void
    {
        require_once __DIR__ . '/../View/task.php';
    }
}