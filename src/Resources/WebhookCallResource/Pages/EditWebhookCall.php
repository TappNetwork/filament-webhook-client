<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Tapp\FilamentWebhookClient\Resources\WebhookCallResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebhookCall extends EditRecord
{
    protected static string $resource = WebhookCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
