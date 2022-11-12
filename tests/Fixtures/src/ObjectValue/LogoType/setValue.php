<?php

use Coquardcyr\Linepay\ObjectValue\LogoType;

return [
    'horizontalShouldWork' => [
        'config' => LogoType::HORIZONTAL,
        'expected' => [
            'raise_error' => false,
            'get_value' => LogoType::HORIZONTAL,
        ]
    ],
    'squareShouldWork' => [
        'config' => LogoType::SQUARE,
        'expected' => [
            'raise_error' => false,
            'get_value' => LogoType::SQUARE,
        ]
    ],
    'circleShouldRaiseException' => [
        'config' => 'c',
        'expected' => [
            'raise_error' => true,
            'get_value' => '',
        ]
    ],
];