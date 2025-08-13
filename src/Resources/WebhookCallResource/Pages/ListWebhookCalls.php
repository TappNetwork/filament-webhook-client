<?php

namespace Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource;

class ListWebhookCalls extends ListRecords
{
    protected static string $resource = WebhookCallResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
