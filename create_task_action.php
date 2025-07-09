<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Task\Controller\TaskController;
use App\Task\Infrastructure\FileTaskStorage;
use App\Task\Service\TaskService;


$taskStorage = new FileTaskStorage();
$taskService = new TaskService($taskStorage);
$taskController = new TaskController($taskService);
$params = $_POST;
$taskController->addTask($params);

/** Порядок редактирования
 * 1. Начать с классов, которые не используют другие классы
 * 2. Организавать namespace -> use
 */