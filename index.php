<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Task\Controller\TaskController;

$taskStorage = new App\Task\Infrastructure\FileTaskStorage();
$taskController = new TaskController($taskStorage);
$taskController->index();