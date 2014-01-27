<?php

namespace Request\ValueObjects;

class Boolean extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        if (is_bool($this->inputValue)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
    }
}
