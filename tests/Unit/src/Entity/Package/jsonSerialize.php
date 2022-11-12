<?php

namespace Coquardcyr\Linepay\Tests\Unit\src\Entity\Package;

use Coquardcyr\Linepay\Entity\Entity;
use Coquardcyr\Linepay\Entity\Package;
use Coquardcyr\Linepay\Tests\Unit\TestCase;

class Test_JsonSerialize extends TestCase
{
    protected $entity;

    /**
     * @dataProvider configTestData
     */
    public function testShouldReturnAsExpected($config, $expected) {
        $this->entity = new Package($config['id'], $config['name'], $config['products']);

       $this->assertSame($expected, json_encode($this->entity));
    }
}