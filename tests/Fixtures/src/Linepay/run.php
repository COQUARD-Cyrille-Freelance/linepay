<?php

use Coquardcyr\Linepay\Proxy\RequestResponse;
use Coquardcyr\Linepay\Request\AbstractRequest;
use Coquardcyr\Linepay\Response\AbstractResponse;

$request = Mockery::mock(AbstractRequest::class);

$response = Mockery::mock(AbstractResponse::class);

$http_response = Mockery::mock(RequestResponse::class);

return [
    'notClientShouldDoNothing' => [
        'config' => [
            'has_client' => false,
            'http_response' => $http_response,
            'request' => $request,
            'response' => $response,
        ],
        'expected' => [
            'results' => null
        ]
    ],
    'clientShouldReturnResponse' => [
        'config' => [
            'has_client' => true,
            'http_response' => $http_response,
            'request' => $request,
            'response' => $response,
        ],
        'expected' => [
            'results' => $response
        ]
    ]
];