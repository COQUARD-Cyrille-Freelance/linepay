<?php

namespace Coquardcyr\Linepay\Entity;

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
     * @var float
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

        $this->amount = array_reduce($products, function (float $amount, Product $product) {
            return $amount + $product->get_price();
        }, 0);

    }

    /**
     * @return float
     */
    public function get_amount() {
        return $this->amount;
    }
}
