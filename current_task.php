<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Task\Controller\TaskController;
use App\Task\Infrastructure\FileTaskStorage;
use App\Task\Service\TaskService;

$taskStorage = new FileTaskStorage();
$taskService = new TaskService($taskStorage);
$taskController = new TaskController($taskService);
$params = $_GET;
$taskId = (int)$params['task_id'];

$taskController->getTask($taskId);

/** current_task.php?task_id=1 */