<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Task\Controller\TaskController;
use App\Task\Infrastructure\FileTaskStorage;

$taskStorage = new FileTaskStorage();
$taskController = new TaskController($taskStorage);
$params = $_GET;
$taskId = (int) $params['task_id'];

$taskController->getTask($taskId);

/** current_task.php?task_id=1 */