<?php

namespace Request\ValueObjects;

class Numeric extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $this->match = is_numeric($this->inputValue);
    }
}
