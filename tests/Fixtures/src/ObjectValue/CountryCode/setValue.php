<?php

use Coquardcyr\Linepay\ObjectValue\CountryCode;

return [
    'thailandShouldWork' => [
        'config' => CountryCode::THAILAND,
        'expected' => [
            'raise_error' => false,
            'get_value' => CountryCode::THAILAND
        ]
    ],
    'taiwanShouldWork' => [
        'config' => CountryCode::TAIWAN,
        'expected' => [
            'raise_error' => false,
            'get_value' => CountryCode::TAIWAN
        ]
    ],
    'japanShouldWork' => [
        'config' => CountryCode::JAPAN,
        'expected' => [
            'raise_error' => false,
            'get_value' => CountryCode::JAPAN
        ]
    ],
    'chinaShouldRaiseError' => [
        'config' => 'CH',
        'expected' => [
            'raise_error' => true,
            'get_value' => ''
        ]
    ]
];