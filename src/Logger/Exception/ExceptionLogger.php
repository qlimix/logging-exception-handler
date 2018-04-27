<?php declare(strict_types=1);

namespace Qlimix\Log\Logger\Exception;

use Qlimix\Log\Handler\Channel;
use Qlimix\Log\Handler\Level;
use Qlimix\Log\Handler\LogHandlerInterface;

final class ExceptionLogger implements ExceptionLoggerInterface
{
    /**
     * @var LogHandlerInterface
     */
    private $logHandler;

    /**
     * @param LogHandlerInterface $logHandler
     */
    public function __construct(LogHandlerInterface $logHandler)
    {
        $this->logHandler = $logHandler;
    }

    /**
     * @inheritDoc
     */
    public function critical(string $channel, \Throwable $exception): void
    {
        $this->logException($channel, Level::createCritical(), $exception);
    }

    /**
     * @inheritDoc
     */
    public function alert(string $channel, \Throwable $exception): void
    {
        $this->logException($channel, Level::createAlert(), $exception);
    }

    /**
     * @inheritDoc
     */
    public function error(string $channel, \Throwable $exception): void
    {
        $this->logException($channel, Level::createError(), $exception);
    }

    /**
     * @inheritDoc
     */
    public function debug(string $channel, \Throwable $exception): void
    {
        $this->logException($channel, Level::createDebug(), $exception);
    }

    /**
     * @inheritDoc
     */
    private function logException(string $channel, Level $level, \Throwable $exception): void
    {
        try {
            $this->logHandler->log(
                new Channel($channel),
                $level,
                $exception->getMessage(),
                [
                    'backtrace' => (string)$exception,
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine()
                ]
            );
        } catch (\Throwable $exception) {
            # not logging the logger
        }
    }
}
