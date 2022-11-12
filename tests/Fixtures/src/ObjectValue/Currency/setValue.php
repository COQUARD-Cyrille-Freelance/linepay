<?php

use Coquardcyr\Linepay\ObjectValue\Currency;

return [
    'usdShouldWork' => [
        'config' => Currency::USD,
        'expected' => [
            'raise_error' => false,
            'get_value' => Currency::USD
        ]
    ],
    'jpyShouldWork' => [
        'config' => Currency::JPY,
        'expected' => [
            'raise_error' => false,
            'get_value' => Currency::JPY
        ]
    ],
    'twdShouldWork' => [
        'config' => Currency::TWD,
        'expected' => [
            'raise_error' => false,
            'get_value' => Currency::TWD
        ]
    ],
    'thbShouldWork' => [
        'config' => Currency::THB,
        'expected' => [
            'raise_error' => false,
            'get_value' => Currency::THB
        ]
    ],
    'eurShouldRaiseError' => [
        'config' => 'EUR',
        'expected' => [
            'raise_error' => true,
            'get_value' => ''
        ]
    ],
];