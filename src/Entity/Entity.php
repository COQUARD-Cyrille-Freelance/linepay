<?php

namespace Coquardcyr\Linepay\Entity;

class Entity implements \JsonSerializable
{

    public function jsonSerialize()
    {
        $attributes = get_class_vars(get_class($this));
        $rtn = array();
        foreach (array_keys($attributes) as $var) {
            $rtn[] = $var;
        }
        return json_encode($rtn);
    }
}
