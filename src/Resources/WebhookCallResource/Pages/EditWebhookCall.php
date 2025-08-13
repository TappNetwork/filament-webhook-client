<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource;

class EditWebhookCall extends EditRecord
{
    protected static string $resource = WebhookCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
