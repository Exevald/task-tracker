<?php

require_once __DIR__ . '/../Model/TaskStorageInterface.php';
require_once __DIR__ . '/../Model/Task.php';

class FileTaskStorage implements TaskStorageInterface
{
    private string $filePath;
    /**
     * @var Task[]
     */
    private array $tasks;

    public function __construct(string $filePath = __DIR__ . '/../../../storage.json')
    {
        $this->filePath = $filePath;
        $this->tasks = $this->loadTasks();
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
        $this->saveTasks();
    }

    public function getNextTaskId(): int
    {
        if (empty($this->tasks)) {
            return 0;
        }
        return $this->tasks[count($this->tasks) - 1]->getId() + 1;
    }

    private function loadTasks(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        $tasksArr = json_decode($data, true);
        if (!is_array($tasksArr)) {
            return [];
        }
        $tasks = [];
        foreach ($tasksArr as $item) {
            $tasks[] = new Task($item['id'], $item['title']);
        }
        return $tasks;
    }

    private function saveTasks(): void
    {
        $tasksArr = array_map(function (Task $task) {
            return [
                'id' => $task->getId(),
                'title' => $task->getTitle(),
            ];
        }, $this->tasks);
        file_put_contents($this->filePath, json_encode($tasksArr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
} 