<?php

namespace Tapp\FilamentWebhookClient\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('id')
                    ->label('ID'),
                Infolists\Components\TextEntry::make('name'),
                Infolists\Components\TextEntry::make('url'),
                Infolists\Components\KeyValueEntry::make('headers')
                    ->columnSpanFull(),
                Infolists\Components\KeyValueEntry::make('payload')
                    ->columnSpanFull(),
                Infolists\Components\KeyValueEntry::make('exception')
                    ->columnSpanFull(),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('headers')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('payload')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('exception')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWebhookCalls::route('/'),
            'create' => Pages\CreateWebhookCall::route('/create'),
            'edit' => Pages\EditWebhookCall::route('/{record}/edit'),
        ];
    }
}
