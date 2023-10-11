<?php

namespace App\Logging\Telegram;

use App\Exceptions\TelegramApiException;
use App\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    private int $chatID;
    private string $token;
    public function __construct(array $config)
    {

        $this->chatID = $config['chat_id'];
        $this->token = $config['token'];
        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);

    }

    protected function write(LogRecord $record): void
    {
        try {
            TelegramBotApi::sendMessage($this->token, $this->chatID, $record->formatted);
        }catch (TelegramApiException $exception){
//            TODO add some action to handle the exception
        }
    }
}
