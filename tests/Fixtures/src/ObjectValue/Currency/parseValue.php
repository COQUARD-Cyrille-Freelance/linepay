<?php

use Coquardcyr\Linepay\ObjectValue\Currency;

return [
    'testJpyShouldParseWithoutComma' => [
        'config' => [
            'currency' => Currency::JPY,
            'value' => 10.456
        ],
        'expected' => '10'
    ],
    'testUsdShouldParseWith2decimals' => [
        'config' => [
            'currency' => Currency::USD,
            'value' => 10.456
        ],
        'expected' => '10.46'
    ],
    'testTwdShouldParseWith2decimals' => [
        'config' => [
            'currency' => Currency::TWD,
            'value' => 10.456
        ],
        'expected' => '10.46'
    ],
    'testThbShouldParseWith2decimals' => [
        'config' => [
            'currency' => Currency::THB,
            'value' => 10.456
        ],
        'expected' => '10.46'
    ]
];