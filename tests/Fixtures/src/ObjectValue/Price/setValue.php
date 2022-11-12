<?php
return [
    'zeroShouldWork' => [
        'config' => 0,
        'expected' => [
            'raise_error' => false,
            'get_value' => 0.0,
        ]
    ],
    'positiveShouldWork' => [
        'config' => 10.345,
        'expected' => [
            'raise_error' => false,
            'get_value' => 10.345,
        ]
    ],
    'negativeShouldRaiseException' => [
        'config' => -1,
        'expected' => [
            'raise_error' => true,
            'get_value' => '',
        ]
    ]
];