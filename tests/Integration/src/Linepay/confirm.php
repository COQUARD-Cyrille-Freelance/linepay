<?php

namespace Coquardcyr\Linepay\Tests\Integration\src\Linepay;

use Coquardcyr\Linepay\Linepay;
use Coquardcyr\Linepay\Proxy\HTTPClient;
use Coquardcyr\Linepay\Request\ConfirmPaymentRequest;
use Coquardcyr\Linepay\Request\RequestingPaymentRequest;
use Coquardcyr\Linepay\Tests\Integration\TestCase;
use Mockery;

class Test_Confirm extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = Mockery::mock(HTTPClient::class);
    }

    /**
     * @dataProvider configTestData
     */
    public function testShouldDoAsExpected($config, $expected) {
        $linepay = new Linepay($config['channel_id'], $config['channel_secret'], $config['dev'], $config['has_client'] ? $this->client : null);
        $request = new ConfirmPaymentRequest($config['amount'], $config['currency'], $config['transaction_id']);
        $this->client->expects()->send($request)->andReturn($expected['response']);
        $linepay->prepare($request);
        $response = $linepay->run($request);

        if(! $config['has_client']) {
            $this->assertNull($response);
            return;
        }

        $this->assertSame($expected['success'], $response->isSuccess());
        $this->assertSame($expected['code'], $response->getCode());
        $this->assertSame($expected['message'], $response->getMessage());
        $this->assertSame(json_encode($expected['payment_info']), json_encode($response->getPayInfo()));
        $this->assertSame($expected['transition_id'], $response->getTransactionId());

    }
}