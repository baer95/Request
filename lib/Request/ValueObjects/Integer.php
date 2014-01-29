<?php

namespace Request\ValueObjects;

class Integer extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $this->match = is_integer($this->inputValue);
    }
}
