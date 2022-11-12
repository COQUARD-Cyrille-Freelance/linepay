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
          'quantity' => new Quantity(10),
          'price' => new Price(10.543),
          'img' => 'img'
      ],
      'expected' => '{"name":"test","quantity":10,"price":10.543,"imageUrl":"img"}'
  ]
];