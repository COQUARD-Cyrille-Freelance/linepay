<?php

namespace Coquardcyr\Linepay\Entity;

use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\ObjectValue\Quantity;

class Product extends Entity
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var Quantity
     */
    protected $quantity;
    /**
     * @var Price
     */
    protected $price;
    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @param string $name
     * @param Quantity $quantity
     * @param Price $price
     * @param string $imageUrl
     */
    public function __construct(string $name, Quantity $quantity, Price $price, string $imageUrl)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
    }

    public function get_price()
    {
        return $this->price;
    }
}
