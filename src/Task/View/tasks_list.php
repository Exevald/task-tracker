<?php
use App\Task\Model\Task;

/**
 * @var Task[] $tasks;
 */
?>

<html lang="ru">
    <head>
        <title>Список задач</title>
        <meta charset="UTF-8">
    </head>
<body>
<h1>Список задач:</h1>
<?php
foreach ($tasks as $task) {
    echo($task->getTitle()) . PHP_EOL;
}
?>
</body>

<form action="../../../create_task_action.php" method="POST">
    <p>Название задачи:</p>
    <label>
        <input type="text" name="title" title="Название задачи">
    </label>
    <button type="submit">Создать задачу</button>
</form>
</html>
