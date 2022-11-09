<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\Request\AbstractRequest;

use Coquardcyr\Linepay\Request\AbstractRequest;
use Coquardcyr\Linepay\Tests\Unit\TestCase;
use Coquardcyr\Linepay\Utils\Clock;
use Coquardcyr\Linepay\Utils\Uniq;

class Test_SetChannelSecret extends TestCase
{
    protected $request;
    protected $clock;
    protected $uniq;

    protected function setUp(): void
    {
        parent::setUp();
        $this->clock = \Mockery::mock(Clock::class);
        $this->uniq = \Mockery::mock(Uniq::class);
        $this->request = \Mockery::mock(AbstractRequest::class, [$this->uniq, $this->clock])->makePartial();
    }

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected($config, $expected) {
        $this->uniq->expects()->uniq()->andReturn($config['uniq']);
        $this->clock->expects()->time()->andReturn($config['time']);
        $this->assertSame($expected['headers']['before'], $this->request->getHeaders());
        $this->request->setChannelSecret($config['channel_secret']);
        $this->assertSame($expected['headers']['after'], $this->request->getHeaders());
    }
}