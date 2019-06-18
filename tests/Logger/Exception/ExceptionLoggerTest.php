<?php declare(strict_types=1);

namespace Qlimix\Tests\Log\Logger\Exception;

use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Qlimix\Log\Handler\Channel;
use Qlimix\Log\Handler\Level;
use Qlimix\Log\Handler\LogHandlerInterface;
use Qlimix\Log\Logger\Exception\ExceptionLogger;

final class ExceptionLoggerTest extends TestCase
{
    /** @var MockObject */
    private $logHandler;

    /** @var ExceptionLogger */
    private $exceptionLogger;

    protected function setUp(): void
    {
        $this->logHandler = $this->createMock(LogHandlerInterface::class);
        $this->exceptionLogger = new ExceptionLogger($this->logHandler);
    }

    /**
     * @test
     */
    public function shouldLogEmergencyException(): void
    {
        $actualMessage = 'test';
        $actualChannel = 'test';

        $this->logHandler->expects($this->once())
            ->method('log')
            ->with(
                $this->callback(
                static function (Channel $channel) use (&$actualChannel) {
                    return $channel->getName() === $actualChannel;
                }),
                $this->callback(static function (Level $level) {
                    return $level->equals(Level::createEmergency());
                }),
                $this->callback(static function (string $message) use (&$actualMessage) {
                    return $message === $actualMessage;
                })
            );

        $this->exceptionLogger->emergency($actualChannel, new Exception($actualMessage));
    }

    /**
     * @test
     */
    public function shouldLogCriticalException(): void
    {
        $actualMessage = 'test';
        $actualChannel = 'test';

        $this->logHandler->expects($this->once())
            ->method('log')
            ->with(
                $this->callback(
                static function (Channel $channel) use (&$actualChannel) {
                    return $channel->getName() === $actualChannel;
                }),
                $this->callback(static function (Level $level) {
                    return $level->equals(Level::createCritical());
                }),
                $this->callback(static function (string $message) use (&$actualMessage) {
                    return $message === $actualMessage;
                })
            );

        $this->exceptionLogger->critical($actualChannel, new Exception($actualMessage));
    }

    /**
     * @test
     */
    public function shouldLogAlertException(): void
    {
        $actualMessage = 'test';
        $actualChannel = 'test';

        $this->logHandler->expects($this->once())
            ->method('log')
            ->with(
                $this->callback(
                static function (Channel $channel) use (&$actualChannel) {
                    return $channel->getName() === $actualChannel;
                }),
                $this->callback(static function (Level $level) {
                    return $level->equals(Level::createAlert());
                }),
                $this->callback(static function (string $message) use (&$actualMessage) {
                    return $message === $actualMessage;
                })
            );

        $this->exceptionLogger->alert($actualChannel, new Exception($actualMessage));
    }

    /**
     * @test
     */
    public function shouldLogErrorException(): void
    {
        $actualMessage = 'test';
        $actualChannel = 'test';

        $this->logHandler->expects($this->once())
            ->method('log')
            ->with(
                $this->callback(
                static function (Channel $channel) use (&$actualChannel) {
                    return $channel->getName() === $actualChannel;
                }),
                $this->callback(static function (Level $level) {
                    return $level->equals(Level::createError());
                }),
                $this->callback(static function (string $message) use (&$actualMessage) {
                    return $message === $actualMessage;
                })
            );

        $this->exceptionLogger->error($actualChannel, new Exception($actualMessage));
    }

    /**
     * @test
     */
    public function shouldLogDebugException(): void
    {
        $actualMessage = 'test';
        $actualChannel = 'test';

        $this->logHandler->expects($this->once())
            ->method('log')
            ->with(
                $this->callback(
                static function (Channel $channel) use (&$actualChannel) {
                    return $channel->getName() === $actualChannel;
                }),
                $this->callback(static function (Level $level) {
                    return $level->equals(Level::createDebug());
                }),
                $this->callback(static function (string $message) use (&$actualMessage) {
                    return $message === $actualMessage;
                })
            );

        $this->exceptionLogger->debug($actualChannel, new Exception($actualMessage));
    }
}
