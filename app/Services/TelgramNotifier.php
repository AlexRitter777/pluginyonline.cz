<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelgramNotifier
{
    public function send(string $message, string $url): void
    {

        Http::post("https://api.telegram.org/bot" . config('services.telegram.bot_token') . "/sendMessage", [
            'chat_id' => (string)config('services.telegram.chat_id'),
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Otevřít zprávu',
                            'url' => $url
                        ]
                    ]
                ]
            ]),
        ]);

    }
}
