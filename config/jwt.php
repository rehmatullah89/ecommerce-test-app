<?php

// config/jwt.php

return [
    'secret' => env('JWT_SECRET'),

    'ttl' => env('JWT_TTL', 60),

    'algo' => 'HS256',

    'required_claims' => ['iat', 'exp', 'sub', 'jti'],

    'leeway' => 0,

    'blacklist_enabled' => true, // Enable blacklist feature

    // Cache settings for JWT blacklist
    'storage' => Tymon\JWTAuth\Providers\Storage\CacheStorage::class, // Use CacheStorage

    'cache' => [
        'driver' => 'file',  // Default file cache, you can also use redis
        'path' => storage_path('framework/cache/data'), // Cache path for file storage
    ],

    'providers' => [
        'user' => Tymon\JWTAuth\Providers\Lumen\Auth\Provider::class, // Correct provider for Lumen
    ],
];
