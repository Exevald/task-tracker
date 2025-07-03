<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Task\Controller\TaskController;
use App\Task\Infrastructure\FileTaskStorage;


$taskStorage = new FileTaskStorage();
$taskController = new TaskController($taskStorage);
$params = $_POST;
$taskController->addTask($params);

/** Порядок редактирования
 * 1. Начать с классов, которые не используют другие классы
 * 2. Организавать namespace -> use
 */