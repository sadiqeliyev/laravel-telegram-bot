<?php

namespace App\Console\Commands;

use App\Services\TelegramService;
use Illuminate\Console\Command;

class TelegramBotUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tg:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $telegramService = app(TelegramService::class);
        $updates = $telegramService->getUpdates();
        foreach ($updates as $update) {
            $telegramService->sendMessage($update['message']['chat']['id'], 'Vizyonsuz');
        }
    }
}
