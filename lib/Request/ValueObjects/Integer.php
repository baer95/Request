<?php

namespace Request\ValueObjects;

class Integer extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        if (is_integer($this->inputValue)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
    }
}
