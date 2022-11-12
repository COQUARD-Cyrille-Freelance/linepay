<?php

namespace Coquardcyr\Linepay\Entity;

use Coquardcyr\Linepay\ObjectValue\Price;

class Package extends Entity
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name = '';
    /**
     * @var Product[]
     */
    protected $products = [];
    /**
     * @var Price
     */
    protected $amount = 0;

    /**
     * @param string $id
     * @param string $name
     * @param Product[] $products
     */
    public function __construct(string $id, string $name, array $products)
    {
        $this->id = $id;
        $this->name = $name;
        $this->products = $products;

        $amount = array_reduce($products, static function (float $amount, Product $product) {
            return $amount + $product->get_price()->getValue();
        }, 0);
        $currency = array_reduce($products, static function($currency, Product $product) {
            if($currency) {
                return $currency;
            }
            return $product->get_price()->getCurrency();
        }, null);

        $this->amount = new Price($amount, $currency);
    }

    /**
     * @return float
     */
    public function get_amount() {
        return $this->amount;
    }
}
