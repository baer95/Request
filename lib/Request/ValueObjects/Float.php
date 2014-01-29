<?php

namespace Request\ValueObjects;

class Float extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $this->match = is_float($this->inputValue);
    }
}
