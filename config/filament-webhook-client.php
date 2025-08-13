<?php

use Spatie\WebhookClient\Models\WebhookCall;
use Tapp\FilamentWebhookClient\Policies\WebhookCallPolicy;
use Tapp\FilamentWebhookClient\Resources\WebhookCallResource;

return [

    'resources' => [
        'WebhookCallResource' => WebhookCallResource::class,
    ],

    'models' => [
        'webhook-call' => WebhookCall::class,
    ],

    'policies' => [
        'webhook-call' => WebhookCallPolicy::class,
    ],

    'navigation' => [
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],

];
