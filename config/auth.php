<?php

return [
    'guards' => [
        'api' => [
            'driver' => 'jwt', // Use JWT for API authentication
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // Your User model
        ],
    ],
];

