<?php
declare(strict_types=1);

namespace App\Task\Infrastructure\Log;

use Psr\Log\AbstractLogger;

class FileLogger extends AbstractLogger
{
    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $message = '[' . $level . '] ' . $message;
        file_put_contents(__DIR__ . '/../../../../log/log.log', $message, FILE_APPEND);
    }
}