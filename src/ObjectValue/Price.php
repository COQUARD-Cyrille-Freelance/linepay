<?php

namespace Coquardcyr\Linepay\ObjectValue;

class Price extends ObjectValue
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->setValue($value);
    }


    public function getValue(): float {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        if(! $value < 0) {
            throw new InvalidValue();
        }
        $this->value = $value;
    }
}
