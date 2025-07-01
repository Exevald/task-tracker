<?php

require_once __DIR__ . '/src/Task/Model/Task.php';
require_once __DIR__ . '/src/Task/Model/TaskStorageInterface.php';
require_once __DIR__ . '/src/Task/Infrastructure/FileTaskStorage.php';
require_once __DIR__ . '/src/Task/Controller/TaskController.php';

$taskStorage = new FileTaskStorage();
$taskController = new TaskController($taskStorage);
$params = $_POST;
$taskController->addTask($params);