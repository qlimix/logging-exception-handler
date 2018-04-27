<?php declare(strict_types=1);

namespace Qlimix\Log\Logger\Exception;

interface ExceptionLoggerInterface
{
    /**
     * @param string $channel
     * @param \Throwable $exception
     */
    public function critical(string $channel, \Throwable $exception): void;

    /**
     * @param string $channel
     * @param \Throwable $exception
     */
    public function alert(string $channel, \Throwable $exception): void;

    /**
     * @param string $channel
     * @param \Throwable $exception
     */
    public function error(string $channel, \Throwable $exception): void;

    /**
     * @param string $channel
     * @param \Throwable $exception
     */
    public function debug(string $channel, \Throwable $exception): void;
}
