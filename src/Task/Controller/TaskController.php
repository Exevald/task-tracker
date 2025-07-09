<?php
declare(strict_types=1);

namespace App\Task\Controller;

use App\Task\Model\Task;
use App\Task\Service\TaskServiceInterface;

class TaskController
{
    private TaskServiceInterface $taskService;

    public function __construct(
        TaskServiceInterface $taskService
    )
    {
        $this->taskService = $taskService;
    }

    public function addTask(array $request): void
    {
        $taskTitle = $request['title'] ?? null;
        if (!$taskTitle) {
            return;
        }
        $id = $this->taskService->addTask($taskTitle);
        $this->getTask($id);
    }

    public function getTask(int $taskId): void
    {
        $task = $this->taskService->getTask($taskId);
        if ($task) {
            $this->currentTask($task);
            return;
        }
        $this->index();
    }

    public function index(): void
    {
        $tasks = $this->taskService->getTasks();
        require_once __DIR__ . '/../View/tasks_list.php';
    }

    public function currentTask(Task $task): void
    {
        require_once __DIR__ . '/../View/task.php';
    }
}