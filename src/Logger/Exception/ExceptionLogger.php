<?php declare(strict_types=1);

namespace Qlimix\Log\Logger\Exception;

use Qlimix\Log\Handler\Channel;
use Qlimix\Log\Handler\Level;
use Qlimix\Log\Handler\LogHandlerInterface;
use Throwable;

final class ExceptionLogger implements ExceptionLoggerInterface
{
    private LogHandlerInterface $logHandler;

    public function __construct(LogHandlerInterface $logHandler)
    {
        $this->logHandler = $logHandler;
    }

    public function emergency(string $channel, Throwable $exception): void
    {
        $this->logException($channel, Level::createEmergency(), $exception);
    }

    public function critical(string $channel, Throwable $exception): void
    {
        $this->logException($channel, Level::createCritical(), $exception);
    }

    public function alert(string $channel, Throwable $exception): void
    {
        $this->logException($channel, Level::createAlert(), $exception);
    }

    public function error(string $channel, Throwable $exception): void
    {
        $this->logException($channel, Level::createError(), $exception);
    }

    public function debug(string $channel, Throwable $exception): void
    {
        $this->logException($channel, Level::createDebug(), $exception);
    }

    private function logException(string $channel, Level $level, Throwable $exception): void
    {
        try {
            $this->logHandler->log(
                new Channel($channel),
                $level,
                $exception->getMessage(),
                [
                    'backtrace' => (string) $exception,
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                ]
            );
        } catch (Throwable $exception) {
            // not logging the logger
        }
    }
}
