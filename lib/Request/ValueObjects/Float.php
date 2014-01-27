<?php

namespace Request\ValueObjects;

class Float extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        if (is_float($this->inputValue)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
    }
}
