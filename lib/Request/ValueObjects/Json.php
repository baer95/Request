<?php

namespace Request\ValueObjects;

class Json extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        json_decode($this->inputValue);
        if (json_last_error() === JSON_ERROR_NONE) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
}
