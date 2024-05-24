<?php

namespace Tapp\FilamentWebhookClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentWebhookClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-webhook-client')
            ->hasConfigFile()
            ->hasTranslations();
    }
}
