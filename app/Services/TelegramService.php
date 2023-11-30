<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    protected $token;
    public function __construct()
    {
        $this->token = env('TELEGRAM_BOT_API_TOKEN');
    }

    public function execute($method, $params = [])
    {
        $url = sprintf('https://api.telegram.org/bot%s/%s', $this->token, $method);
        $request = Http::post($url, $params);
        return $request->json();
    }

    public function getUpdates(int $offset = 0)
    {
        $response = $this->execute('getUpdates', [
            'offset' => $offset
        ]);

        return $response['result'];
    }

    public function sendMessage(string $chatId, string $text)
    {
        $response = $this->execute('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
        return $response;
    }
}
