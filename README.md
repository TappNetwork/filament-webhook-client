# Filament Webhook Client Plugin

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tapp/filament-webhook-client.svg?style=flat-square)](https://packagist.org/packages/tapp/filament-webhook-client)
![GitHub Tests Action Status](https://github.com/TappNetwork/filament-webhook-client/actions/workflows/run-tests.yml/badge.svg)
![GitHub Code Style Action Status](https://github.com/TappNetwork/filament-webhook-client/actions/workflows/fix-php-code-style-issues.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/tapp/filament-webhook-client.svg?style=flat-square)](https://packagist.org/packages/tapp/filament-webhook-client)

This plugin adds a Filament resource and a policy for [Spatie Webhook Client](https://github.com/spatie/laravel-webhook-client/).

## Installation

> [!IMPORTANT]
> First, make sure you have [Spatie Webhook Client](https://github.com/spatie/laravel-webhook-client/)
> installed and configured.

You can install the package via composer:

```bash
composer require tapp/filament-webhook-client
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-webhook-client-config"
```

This is the contents of the published config file:

```php
return [

    'resources' => [
        'WebhookCallResource' => \Tapp\FilamentWebhookClient\Resources\WebhookCallResource::class,
    ],

    'models' => [
        'webhook-call' => \Spatie\WebhookClient\Models\WebhookCall::class,
    ],

    'policies' => [
        'webhook-call' => \Tapp\FilamentWebhookClient\Policies\WebhookCallPolicy::class,
    ],

    'navigation' => [
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],

];
```

Optionally, you can publish the translations file using:

```bash
php artisan vendor:publish --tag="filament-webhook-client-translations"
```

## Usage

Add this plugin to a panel on `plugins()` method. 
E.g. in `app/Providers/Filament/AdminPanelProvider.php`:

```php
use Tapp\FilamentWebhookClient\FilamentWebhookClientPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugins([
            FilamentWebhookClientPlugin::make(),
            //...
        ]);
}
```

Make sure that the user you are logged in have the `view webhook call` permission and the webhook client resource will be displayed.
To use another permission and override the default policy, please refer to the section below.

## Webhook Call Policy

By default, the policy included in this plugin allows you to view the list of webhook calls and an individual webhook call.
If you need to change the permissions, you can override the policy by creating a policy in you project and adding it on `policies -> webhook-call` entry in `filament-webhook-client.php` config file.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security-related issues, please email security@tappnetwork.com.

## Credits

-  [Tapp Network](https://github.com/TappNetwork)
-  [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
