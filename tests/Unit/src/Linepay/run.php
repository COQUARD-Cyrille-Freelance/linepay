<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\Linepay;

use Coquardcyr\Linepay\Linepay;
use Coquardcyr\Linepay\Proxy\HTTPClient;
use Coquardcyr\Linepay\Request\AbstractRequest;
use Coquardcyr\Linepay\Response\ResponseFactory;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_Run extends TestCase
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
        $this->request = \Mockery::mock(AbstractRequest::class);
    }

    /**
     * @dataProvider configTestData
     */
    public function testShouldDoAsExpected($config, $expected) {
        $this->linepay = new Linepay('id_channel', 'secret_channel', false, $config['has_client'] ? $this->client : null, $this->response_factory);

        if( $config['has_client'] ) {
            $this->response_factory->expects()->make($config['request'], $config['http_response'])->andReturn($config['response']);
            $this->client->expects()->send($config['request'])->andReturn($config['http_response']);
        }

        $this->assertEquals($expected['results'], $this->linepay->run($config['request']));
    }
}