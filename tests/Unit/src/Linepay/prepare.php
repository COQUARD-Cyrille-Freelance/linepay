<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\Linepay;

use Coquardcyr\Linepay\Linepay;
use Coquardcyr\Linepay\Proxy\HTTPClient;
use Coquardcyr\Linepay\Request\AbstractRequest;
use Coquardcyr\Linepay\Response\ResponseFactory;
use Coquardcyr\Linepay\Tests\Unit\TestCase;
use Mockery\Mock;

class Test_Prepare extends TestCase
{
    protected $linepay;
    protected $client;
    protected $response_factory;
    protected $request;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = \Mockery::mock(HTTPClient::class);
        $this->response_factory = \Mockery::mock(ResponseFactory::class);
        $this->linepay = new Linepay('id_channel', 'secret_channel', false, $this->client, $this->response_factory);
        $this->request = \Mockery::mock(AbstractRequest::class);
    }

    public function testShouldDoAsExpected() {
        $this->request->expects()->setChannelId('id_channel');
        $this->request->expects()->setChannelSecret('secret_channel');
        $this->request->expects()->setBaseUrl('https://api-pay.line.me');
    }
}