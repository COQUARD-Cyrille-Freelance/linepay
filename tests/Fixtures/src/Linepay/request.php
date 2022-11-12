<?php

use Coquardcyr\Linepay\Entity\Package;
use Coquardcyr\Linepay\Entity\Product;
use Coquardcyr\Linepay\ObjectValue\Currency;
use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\ObjectValue\Quantity;
use Coquardcyr\Linepay\Proxy\RequestResponse;

return [
    'successShouldReturnSuccessfulResponse' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => true,
            'order_id' => 'order_id',
            'currency' => new Currency(Currency::JPY),
            'name' => 'name',
            'packages' => [
                new Package('package_id', 'package_name', [
                    new Product('product_name', new Quantity(10), new Price(10.564, new Currency(Currency::JPY)), 'img')
                ]),
            ],
            'confirm_url' => 'confirm_url',
            'cancel_url' => 'cancel_url'
        ],
        'expected' => [
            'response' => new RequestResponse(200, 'message', '{"info": {"transactionId": "transactionId", "paymentUrl": {"web": "web"}}}'),
            'success' => true,
            'code' => 200,
            'message' => 'message',
            'payment_url' => 'web',
            'transition_id' => 'transactionId'
        ]
    ],
    'errorShouldReturnFailureResponse' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => true,
            'order_id' => 'order_id',
            'currency' => new Currency(Currency::JPY),
            'name' => 'name',
            'packages' => [
                new Package('package_id', 'package_name', [
                    new Product('product_name', new Quantity(10), new Price(10.564, new Currency(Currency::JPY)), 'img')
                ]),
            ],
            'confirm_url' => 'confirm_url',
            'cancel_url' => 'cancel_url'
        ],
        'expected' => [
            'response' => new RequestResponse(400, 'message', '{"info": {"transactionId": "transactionId", "paymentUrl": {"web": "web"}}}'),
            'success' => false,
            'code' => 400,
            'message' => 'message',
            'payment_url' => '',
            'transition_id' => ''
        ]
    ],
    'noClientShouldReturnNothing' => [
        'config' => [
            'channel_id' => 'channel_id',
            'channel_secret' => 'channel_secret',
            'dev' => false,
            'has_client' => false,
            'order_id' => 'order_id',
            'currency' => new Currency(Currency::JPY),
            'name' => 'name',
            'packages' => [
                new Package('package_id', 'package_name', [
                    new Product('product_name', new Quantity(10), new Price(10.564, new Currency(Currency::JPY)), 'img')
                ]),
            ],
            'confirm_url' => 'confirm_url',
            'cancel_url' => 'cancel_url'
        ],
        'expected' => [
            'response' => null,
        ]
    ]
];