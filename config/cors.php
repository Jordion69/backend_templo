<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // 'paths' => ['api/*', 'sanctum/csrf-cookie', 'EnviarCorreo'],

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'noticias/first-seven',
        'noticias/first-three',
        'noticias/from-fourth',
        'garitos/random-seven',
        'garitos/random-from-cities',
        'garitos/all-by-province',
        'conciertos-first-ten-upcoming',
        'conciertos-last-week-updates',
        'conciertos-all-from-today',
        'EnviarCorreo',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*', 'http://localhost:4200'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'allow_credentials' => true,

    'max_age' => 0,

    'supports_credentials' => false,

];
