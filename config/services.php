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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
        'client_id'     => '75de589126a5b4ebf60d',
        'client_secret' => '5e800b3c6603a858fa96b51d5bc7310eb5c1e966',
        'redirect'      => 'http://127.0.0.1:8000/login/github/callback',
    ],

    'facebook' => [
        'client_id'     => '139512936632230',
        'client_secret' => '57a212cec3adfbfeec64922d503c9042',
        'redirect'      => 'http://127.0.0.1:8000/login/facebook/callback',
    ],

    'google' => [
        'client_id'     => '132525425287-g6auaf643dbmve206f5481pr26phq66t.apps.googleusercontent.com',
        'client_secret' => 'fps-JqtQlrTQzx_2bssHG4OY',
        'redirect'      => 'http://127.0.0.1:8000/login/google/callback',
    ],

];
