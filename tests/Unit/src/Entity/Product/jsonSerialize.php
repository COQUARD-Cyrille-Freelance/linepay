<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\Entity\Product;

use Coquardcyr\Linepay\Entity\Entity;
use Coquardcyr\Linepay\Entity\Product;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_JsonSerialize extends TestCase
{
    protected $entity;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected($config, $expected) {
        $this->entity = new Product($config['name'], $config['quantity'], $config['price'], $config['img']);

       $this->assertSame($expected, json_encode($this->entity));
    }
}