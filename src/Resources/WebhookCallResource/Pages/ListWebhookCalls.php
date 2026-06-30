<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWebhookCalls extends ListRecords
{
    public static function getResource(): string
    {
        return config('filament-webhook-client.resources.WebhookCallResource');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
