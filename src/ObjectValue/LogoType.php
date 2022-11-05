<?php

namespace Coquardcyr\Linepay\ObjectValue;

class LogoType
{
    const HORIZONTAL = 'h';
    const SQUARE = 'v';

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
