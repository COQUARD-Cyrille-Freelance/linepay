<?php

namespace Coquardcyr\Linepay\ObjectValue;

class CountryCode
{
    const JAPAN = 'JP';
    const THAILAND = 'TH';
    const TAIWAN = 'TW';

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

    public function setValue(string $value) {

    }

}
