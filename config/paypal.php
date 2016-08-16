<?php
return array(
    // set your paypal credential
    'client_id' => 'AclhXx1bSSEFRh-bP-SUdDmqjPnGRuZ1VcFtO7sJF0fNReGIHdbUDooWPbhdU3gKn3AbsHHI78KocT40',
    'secret' => 'ENBZANLKcHex9YYEgWJSbKrQwMqt8J-ihAbXu-fG0FMCpiDg_ft8hWWZu7J3PRc9OmLA3gr8-dmw4BJf',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

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

