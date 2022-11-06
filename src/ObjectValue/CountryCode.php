<?php

namespace Coquardcyr\Linepay\ObjectValue;

class CountryCode extends ObjectValue
{
    const JAPAN = 'JP';
    const THAILAND = 'TH';
    const TAIWAN = 'TW';

    public static $values = [
        self::JAPAN,
        self::TAIWAN,
        self::THAILAND
    ];
    /**
     * @var string
     */
    protected $value = '';

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->setValue($value);
    }


    public function getValue(): string {
        return $this->value;
    }

    public function setValue(string $value) {
        if( ! in_array($value, self::$values)) {
            throw new InvalidValue();
        }
        $this->value = $value;
    }

}
