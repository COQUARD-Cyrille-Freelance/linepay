<?php

use Coquardcyr\Linepay\ObjectValue\Currency;
use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\Proxy\RequestResponse;

return [
    'successShouldReturnSuccessfulResponse' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => true,
            'transaction_id' => 'transaction_id',
            'amount' => new Price(10.543, new Currency(Currency::JPY)),
        ],
        'expected' => [
            'response' => new RequestResponse(200, 'message', 'body'),
            'success' => true,
            'code' => 200,
            'message' => 'message',
        ]
    ],
    'errorShouldReturnFailureResponse' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => true,
            'transaction_id' => 'transaction_id',
            'amount' => new Price(10.543, new Currency(Currency::JPY)),
        ],
        'expected' => [
            'response' => new RequestResponse(400, 'message', 'body'),
            'success' => false,
            'code' => 400,
            'message' => 'message',
        ]
    ],
    'noClientShouldReturnNothing' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => false,
            'transaction_id' => 'transaction_id',
            'amount' => new Price(10.543, new Currency(Currency::JPY)),
        ],
        'expected' => [
            'response' => null,
        ]
    ]
];