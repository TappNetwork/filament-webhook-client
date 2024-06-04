<?php

namespace Tapp\FilamentWebhookClient;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentWebhookClientPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-webhook-client';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources(
                config('filament-webhook-client.resources')
            );
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
