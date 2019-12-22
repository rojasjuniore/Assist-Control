<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'https://homeopatia.smartbiosfera.com/login/facebook/callback',
    ],

//    'google' => [
//        'client_id' => ('584357476065-t6cg4oe51c8mklvodlpsa3u58eks0co1.apps.googleusercontent.com'),
//        'client_secret' => ('3TYG5hyEIk0RNSGyAH4uPMZi'),
//        'redirect' => 'https://app.efectylogistic.com/login/google/callback',
//    ],
//
//    'facebook' => [
//        'client_id' => ('334706870513394'),
//        'client_secret' => ('b4f96080783cd8d9d784ba5dd96213a1'),
//        'redirect' => 'https://app.efectylogistic.com/login/facebook/callback',
//    ],
];
