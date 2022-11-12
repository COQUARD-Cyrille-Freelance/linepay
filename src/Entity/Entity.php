<?php

namespace Coquardcyr\Linepay\Entity;

use JsonSerializable;

class Entity implements JsonSerializable
{

    public function jsonSerialize()
    {
        $attributes = get_class_vars(get_class($this));
        $rtn = array();
        foreach (array_keys($attributes) as $var) {
            if(is_array($this->{$var})) {
                $rtn[$var] = array_map(static function ($e) {
                    return self::parseJsonAttribute($e);
                }, $this->{$var});
            } else {
                $rtn[$var] = $this->parseJsonAttribute($this->{$var});
            }
        }
        return $rtn;
    }

    protected static function parseJsonAttribute($value) {
        if($value instanceof JsonSerializable) {
            return $value->jsonSerialize();
        }

        return $value;
    }
}
