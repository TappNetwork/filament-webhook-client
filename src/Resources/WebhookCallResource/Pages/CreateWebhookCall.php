<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Filament\Resources\Pages\CreateRecord;

class CreateWebhookCall extends CreateRecord
{
    public static function getResource(): string
    {
        return config('filament-webhook-client.resources.WebhookCallResource');
    }
}
