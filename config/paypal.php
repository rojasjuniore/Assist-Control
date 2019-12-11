<?php

/* SISTEMA VIEJO
return [
    'client_id' => env('PAYPAL_CLIENT_ID', ''),
    'secret' => env('PAYPAL_SECRET', ''),
    'settings' => array(
        'mode' => env('PAYPAL_MODE', 'sandbox'), //Option 'sandbox' or 'live', sandbox for testing
        'http.ConnectionTimeOut' => 1000, //Max request time in seconds
        'log.LogEnabled' => true, //Whether want to log to a file
        'log.FileName' => storage_path() . '/logs/paypal.log', //Specify the file that want to write on
        'log.LogLevel' => 'FINE' //Available option 'FINE', 'INFO', 'WARN' or 'ERROR'

    ),
];
*/

return array(
    // set your paypal credential
    'client_id' => env('PAYPAL_CLIENT_ID', ''),
    'secret' => env('PAYPAL_SECRET', ''),

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => env('PAYPAL_MODE', 'sandbox'),

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 300,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);