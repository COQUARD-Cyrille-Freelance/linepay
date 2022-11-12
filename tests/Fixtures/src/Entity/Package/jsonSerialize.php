<?php

use Coquardcyr\Linepay\Entity\Product;
use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\ObjectValue\Quantity;

$product = new Product('product_name', new Quantity(10), new Price(10.56), 'img');

return [
  'shouldReturnJsonAttributes' => [
      'config' => [
          'id' => 10,
          'name' => 'test',
          'products' => [
              $product
          ]
      ],
      'expected' => '{"id":"10","name":"test","products":[{"name":"product_name","quantity":10,"price":10.56,"imageUrl":"img"}],"amount":10.56}'
  ]
];