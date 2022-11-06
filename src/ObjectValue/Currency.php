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
