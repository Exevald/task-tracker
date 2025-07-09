<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Task\Controller\TaskController;
use App\Task\Service\TaskService;

$taskStorage = new App\Task\Infrastructure\FileTaskStorage();
$taskService = new TaskService($taskStorage);
$taskController = new TaskController($taskService);
$taskController->index();