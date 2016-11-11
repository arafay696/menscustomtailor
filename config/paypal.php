<?php
return array(
    // Sandbox: Paypal Credential
    //'client_id' => 'AclhXx1bSSEFRh-bP-SUdDmqjPnGRuZ1VcFtO7sJF0fNReGIHdbUDooWPbhdU3gKn3AbsHHI78KocT40',
    //'secret' => 'ENBZANLKcHex9YYEgWJSbKrQwMqt8J-ihAbXu-fG0FMCpiDg_ft8hWWZu7J3PRc9OmLA3gr8-dmw4BJf',

    // LIVE: Paypal Credential
    'client_id' => 'AQuBMXv5VtGLUptfDVt_QG2QmO24vCghnSxSjg9flGpDNqD2kftVfzQGU14AzrDQDEgzdiFC23Nci2LP',
    'secret' => 'EHDrAA6eprVvNbYqJUxmqTeom5JPW5_Bm53BwkmRwRp74C9dWhnEqtxvFisaFHYvFYSr7OrhppN0x3JU',


    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',

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

