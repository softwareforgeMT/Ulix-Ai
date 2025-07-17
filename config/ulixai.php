<?php

return [
    'fees' => [
        'client' => env('ULIXAI_CLIENT_FEE', 5),      // % client-side commission
        'provider' => env('ULIXAI_PROVIDER_FEE', 15), // % provider-side commission
        'affiliate' => env('ULIXAI_AFFILIATE_FEE', 30), // % affiliate commission
    ],
];
