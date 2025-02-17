<?php

namespace App\ApiServices;

use App\Exceptions\TelegramBotApiException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramBotApi
{
    const HOST = 'https://api.telegram.org/bot';

    protected string $token;
    protected string $chatId;

    public function __construct(?string $token = null, ?string $chatId = null)
    {
        $this->token = $token ?? env('LOGGER_TELEGRAM_BOT_TOKEN');
        $this->chatId = $chatId ?? env('LOGGER_TELEGRAM_CHAT_ID');
    }

    public function sendMessage(string $message, ?string $chatId = null): bool
    {
        $chatId = $chatId ?? $this->chatId;

        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        $message = mb_substr($message, 0, 1000);

        try {
            $response = Http::withoutVerifying()->get(self::HOST . $this->token . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown',
            ]);

            $response->successful();
            return true;
        } catch (\Throwable $exception) {
            Log::error('Ошибка отправки сообщения в Telegram', [
                'error' => $exception->getMessage(),
                'chat_id' => $chatId,
                'message' => $message
            ]);
            return false;
        }
    }
}
