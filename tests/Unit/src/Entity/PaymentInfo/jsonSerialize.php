<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\Entity\PaymentInfo;

use Coquardcyr\Linepay\Entity\Entity;
use Coquardcyr\Linepay\Entity\PaymentInfo;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_JsonSerialize extends TestCase
{
    protected $entity;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected($config, $expected) {
        $this->entity = new PaymentInfo($config['method'], $config['amount']);
       $this->assertSame($expected, json_encode($this->entity));
    }
}