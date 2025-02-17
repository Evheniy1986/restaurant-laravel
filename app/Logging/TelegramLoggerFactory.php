<?php

namespace App\Logging;

use App\ApiServices\TelegramBotApi;
use Monolog\Level;
use Monolog\Logger;

class TelegramLoggerFactory
{
    public function __invoke($config): Logger
    {
        $telegram = new TelegramBotApi();
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramLogger($telegram, $config['level'] ?? Level::Debug));

        return $logger;
    }
}
