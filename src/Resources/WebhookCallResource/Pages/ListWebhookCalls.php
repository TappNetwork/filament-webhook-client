<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Tapp\FilamentWebhookClient\Resources\WebhookCallResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebhookCalls extends ListRecords
{
    protected static string $resource = WebhookCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
