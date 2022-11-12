<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\ObjectValue\Currency;

use Coquardcyr\Linepay\ObjectValue\Currency;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_ParseValue extends TestCase
{
    /**
     * @dataProvider configTestData
     */
    public function testShouldDoAsExpected($config, $expected) {
        $currency = new Currency($config['currency']);
        $this->assertSame($expected, $currency->parseValue($config['value']));
    }
}