<?php

namespace Tapp\FilamentWebhookClient\Resources;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages\ListWebhookCalls;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages\CreateWebhookCall;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages\EditWebhookCall;
use Filament\Forms;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\WebhookClient\Models\WebhookCall;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource\Pages;

class WebhookCallResource extends Resource
{
    protected static ?string $model = WebhookCall::class;

    public static function getNavigationIcon(): string
    {
        return config('filament-webhook-client.navigation.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-webhook-client.navigation.sort');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-webhook-client::filament-webhook-client.navigation.group');
    }

    public static function getLabel(): string
    {
        return __('filament-webhook-client::filament-webhook-client.navigation.label');
    }

    public static function getPluralLabel(): string
    {
        return __('filament-webhook-client::filament-webhook-client.navigation.plural-label');
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name'),
                TextEntry::make('url'),
                ViewEntry::make('headers')
                    ->view('filament-webhook-client::infolists.entries.formatted-json')
                    ->columnSpanFull(),
                ViewEntry::make('payload')
                    ->view('filament-webhook-client::infolists.entries.formatted-json')
                    ->columnSpanFull(),
                ViewEntry::make('exception')
                    ->view('filament-webhook-client::infolists.entries.formatted-json')
                    ->columnSpanFull(),
            ]);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                TextInput::make('headers')
                    ->columnSpanFull(),
                Textarea::make('payload')
                    ->columnSpanFull(),
                Textarea::make('exception')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('url')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->stickyModalFooter()
                    ->stickyModalHeader(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebhookCalls::route('/'),
            'create' => CreateWebhookCall::route('/create'),
            'edit' => EditWebhookCall::route('/{record}/edit'),
        ];
    }
}
