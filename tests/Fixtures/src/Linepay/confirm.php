<?php

use Coquardcyr\Linepay\Entity\PaymentInfo;
use Coquardcyr\Linepay\ObjectValue\Currency;
use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\Proxy\RequestResponse;

$json = json_encode([
  'info' => [
      'payInfo' => [
           [
               'method' => 'TEST',
               'amount' => 40.50
           ]
      ],
      'transactionId' => 'transactionId'
  ]
]);

return [
    'successShouldReturnSuccessfulResponse' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => true,
            'amount' => new Price(40.50, new Currency(Currency::JPY)),
            'currency' => new Currency(Currency::JPY),
            'transaction_id' => 'transaction_id'
        ],
        'expected' => [
            'response' => new RequestResponse(200, 'message', $json),
            'success' => true,
            'code' => 200,
            'message' => 'message',
            'payment_info' => [
                new PaymentInfo('TEST', new Price(40.50))
            ],
            'transition_id' => 'transactionId'
        ]
    ],
    'errorShouldReturnFailureResponse' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => true,
            'amount' => new Price(40.50, new Currency(Currency::JPY)),
            'currency' => new Currency(Currency::JPY),
            'transaction_id' => 'transaction_id'
        ],
        'expected' => [
            'response' => new RequestResponse(400, 'message', $json),
            'success' => false,
            'code' => 400,
            'message' => 'message',
            'payment_info' => [],
            'transition_id' => ''
        ]
    ],
    'noClientShouldReturnNothing' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => false,
            'amount' => new Price(40.50, new Currency(Currency::JPY)),
            'currency' => new Currency(Currency::JPY),
            'transaction_id' => 'transaction_id'
        ],
        'expected' => [
            'response' => null,
        ]
    ]
];