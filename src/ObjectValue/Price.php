<?php

namespace Coquardcyr\Linepay\ObjectValue;

class Price extends ObjectValue
{
    /**
     * @var string
     */
    protected $value = '';

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }


    public function getValue(): string {
        return $this->value;
    }
}