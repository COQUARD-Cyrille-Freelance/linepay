<?php

namespace Coquardcyr\Linepay\ObjectValue;

class Currency extends ObjectValue
{
    const USD = 'USD';
    const JPY = 'JPY';
    const TWD = 'TWD';
    const THB = 'THB';

    public static $values = [
      self::USD,
      self::JPY,
      self::TWD,
      self::THB
    ];

    public static $decimals = [
        self::USD => 2,
        self::JPY => 0,
        self::TWD => 2,
        self::THB => 2
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

    public function parseValue(float $value): string {
        if(! in_array($this->value, self::$values)) {
            return $value;
        }
        return number_format($value, self::$decimals[$this->value]);
    }
}
