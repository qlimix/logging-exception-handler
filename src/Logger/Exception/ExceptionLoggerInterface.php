<?php declare(strict_types=1);

namespace Qlimix\Log\Logger\Exception;

use Throwable;

interface ExceptionLoggerInterface
{
    public function emergency(string $channel, Throwable $exception): void;

    public function critical(string $channel, Throwable $exception): void;

    public function alert(string $channel, Throwable $exception): void;

    public function error(string $channel, Throwable $exception): void;

    public function debug(string $channel, Throwable $exception): void;
}
