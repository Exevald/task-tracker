<?php
use App\Task\Model\Task;

/**
 * @var Task $task;
 */
?>

<div>
    <p>Наша новая задача: </p>
    <p><?= $task->getTitle() ?></p>
</div>
