<?php

namespace App\Logging;

use App\ApiServices\TelegramBotApi;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\LogRecord;

class TelegramLogger extends AbstractProcessingHandler
{
    private TelegramBotApi $telegram;

    public function __construct(TelegramBotApi $telegram, $config, bool $bubble = true)
    {
        $level = Logger::toMonologLevel($config);
        parent::__construct($level, $bubble);
        $this->telegram = $telegram;
    }

    public function write(LogRecord $record): void
    {
        $message = "🚨 *Ошибка в приложении!* 🚨\n\n";

        $message .= "📝 *Уровень:* " . $record->level->getName() . "\n";
        $message .= "📌 *Сообщение:* " . $record->formatted . "\n";
        $message .= "🕒 *Дата:* " . $record->datetime->format('Y-m-d H:i:s');

        try {
            $this->telegram->sendMessage($message);
        } catch (\Throwable $exception) {
            Log::error('Не удалось отправить сообщение в Telegram', [
                'error' => $exception->getMessage(),
                'message' => $message
            ]);
        }
    }
}
