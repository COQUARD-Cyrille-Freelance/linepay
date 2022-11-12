<?php

use Coquardcyr\Linepay\ObjectValue\Currency;

return [
    'noCurrencyShouldReturnValue' => [
        'config' => [
            'value' => 10.543,
            'currency' => null
        ],
        'expected' => 10.543
    ],
    'jpyShouldReturnFormatedValue' => [
        'config' => [
            'value' => 10.543,
            'currency' => new Currency(Currency::JPY)
        ],
        'expected' => 11.0
    ]
];