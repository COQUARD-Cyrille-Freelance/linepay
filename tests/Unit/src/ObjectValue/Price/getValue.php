<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\ObjectValue\Price;

use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_GetValue extends TestCase
{
    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected($config, $expected) {
        $price = new Price($config['value'], $config['currency']);
        $this->assertSame($expected, $price->getValue());
    }
}