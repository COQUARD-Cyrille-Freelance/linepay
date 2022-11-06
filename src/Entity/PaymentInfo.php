<?php

namespace Coquardcyr\Linepay\Entity;

use Coquardcyr\Linepay\ObjectValue\Price;

class PaymentInfo extends Entity
{
    /**
     * @var string
     */
    protected $method = '';

    /**
     * @var Price
     */
    protected $amount;

    /**
     * @param string $method
     * @param Price $amount
     */
    public function __construct(string $method, Price $amount)
    {
        $this->method = $method;
        $this->amount = $amount;
    }


}