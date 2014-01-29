<?php

namespace Request\ValueObjects;

class Boolean extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $this->match = is_bool($this->inputValue);
    }
}
