<?php

namespace Request\ValueObjects;

class Boolean extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $this->correctedValue = (boolean) $this->inputValue;
    }
}
