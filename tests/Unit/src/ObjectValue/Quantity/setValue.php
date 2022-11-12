<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\ObjectValue\Quantity;

use Coquardcyr\Linepay\ObjectValue\CountryCode;
use Coquardcyr\Linepay\ObjectValue\InvalidValue;
use Coquardcyr\Linepay\ObjectValue\Quantity;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_SetValue extends TestCase
{
    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected($config, $expected) {
        if($expected['raise_error']) {
            $this->expectException(InvalidValue::class);
        }
        $object_value = new Quantity($config);
        if(! $expected['raise_error']) {
            $this->assertSame($expected['get_value'], $object_value->getValue());
        }
    }
}