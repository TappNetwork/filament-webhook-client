<?php

declare(strict_types=1);

// Register the package view namespace for static analysis
if (function_exists('view')) {
    app('view')->addNamespace(
        'filament-webhook-client',
        __DIR__.'/resources/views'
    );
}
