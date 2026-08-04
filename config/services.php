<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => '458624112542-p25bgg3lhjk0om6k8ikghgd77r73f23h.apps.googleusercontent.com', //'840637777526-mq857oa9ki9ad2o3m6u09lqdiepvs8ud.apps.googleusercontent.com',
        'client_secret' => 'sfNt9IZkes223oj8NfcxtHja', //'36GUWMVScjnqSCo0ZN0BjHDq',
        'redirect'      => 'http://localhost:8000/callback',
        // 'redirect'      => 'http://localhost:8000/callback',
        // 'redirect'      => 'http://localhost:8000/sso/public/callback',
    ],
];
