<?php

namespace NotificationChannels\HipChat;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;

class HipChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(HipChatChannel::class)
            ->needs(HipChat::class)
            ->give(function () {
                return new HipChat(
                    new HttpClient,
                    config('services.hipchat.url'),
                    config('services.hipchat.token'),
                    config('services.hipchat.room')
                );
            });
    }
}
