<?php

namespace Request\ValueObjects;

class Numeric extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        if (is_numeric($this->inputValue)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
    }
}
