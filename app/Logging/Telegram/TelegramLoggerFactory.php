<?php

namespace App\Logging\Telegram;

use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerFactory
{
    public function __invoke(array $config): Logger
    {
        $logger =  new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler($config));
        return $logger;
    }
}
