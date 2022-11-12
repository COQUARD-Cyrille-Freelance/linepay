<?php
return [
    'zeroShouldWork' => [
        'config' => 0,
        'expected' => [
            'raise_error' => false,
            'get_value' => 0,
        ]
    ],
    'positiveShouldWork' => [
        'config' => 10,
        'expected' => [
            'raise_error' => false,
            'get_value' => 10,
        ]
    ],
    'floatShouldCut' => [
        'config' => 10.234,
        'expected' => [
            'raise_error' => false,
            'get_value' => 10,
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