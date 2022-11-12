<?php

use Coquardcyr\Linepay\Entity\Product;
use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\ObjectValue\Quantity;

return [
  'shouldReturnJsonAttributes' => [
      'config' => [
          'method' => 'method',
          'amount' => new Price(10.543),
      ],
      'expected' => '{"method":"method","amount":10.543}'
  ]
];