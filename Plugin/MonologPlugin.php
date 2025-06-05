<?php

namespace JustBetter\Sentry\Plugin;

use JustBetter\Sentry\Helper\Data;
use JustBetter\Sentry\Model\SentryLog;
use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\Logger\Monolog;
use Monolog\Level;
use Monolog\JsonSerializableDateTimeImmutable;

class MonologPlugin extends Monolog
{
    /**
     * Mapping between levels numbers defined in RFC 5424 and Monolog ones
     *
     * @phpstan-var array<int, Level> $rfc_5424_levels
     */
    private const RFC_5424_LEVELS = [
        7 => Level::Debug,
        6 => Level::Info,
        5 => Level::Notice,
        4 => Level::Warning,
        3 => Level::Error,
        2 => Level::Critical,
        1 => Level::Alert,
        0 => Level::Emergency,
    ];

    /**
     * @psalm-param array<callable(array): array> $processors
     *
     * @param string                              $name             The logging channel, a simple descriptive name that is attached to all log records
     * @param Data                                $sentryHelper
     * @param SentryLog                           $sentryLog
     * @param DeploymentConfig                    $deploymentConfig
     * @param \Monolog\Handler\HandlerInterface[] $handlers         Optional stack of handlers, the first one in the array is called first, etc.
     * @param callable[]                          $processors       Optional array of processors
     */
    public function __construct(
        $name,
        protected Data $sentryHelper,
        protected SentryLog $sentryLog,
        protected DeploymentConfig $deploymentConfig,
        array $handlers = [],
        array $processors = []
    ) {
        parent::__construct($name, $handlers, $processors);
    }

    /**
     * Adds a log record to Sentry.
     *
     * @param int                               $level    The logging level
     * @param string                            $message  The log message
     * @param array                             $context  The log context
     * @param JsonSerializableDateTimeImmutable $datetime Datetime of log
     *
     * @return bool Whether the record has been processed
     */
    public function addRecord(
        int|Level $level,
        string $message,
        array $context = [],
        JsonSerializableDateTimeImmutable|null $datetime = null
    ): bool {
        if ($this->deploymentConfig->isAvailable() && $this->sentryHelper->isActive()) {
            $this->sentryLog->send($message, $level, $context);
        }

        // @phpstan-ignore argument.type
        return parent::addRecord($level, $message, $context, $datetime);
    }
}
