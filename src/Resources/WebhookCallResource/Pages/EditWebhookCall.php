<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWebhookCall extends EditRecord
{
    public static function getResource(): string
    {
        return config('filament-webhook-client.resources.WebhookCallResource');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
