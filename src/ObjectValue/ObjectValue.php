<?php

namespace Coquardcyr\Linepay\ObjectValue;

abstract class ObjectValue implements \JsonSerializable
{
    protected $value;

    public function jsonSerialize()
    {
        return $this->value;
    }
}
