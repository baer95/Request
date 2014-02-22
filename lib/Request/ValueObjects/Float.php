<?php

namespace Request\ValueObjects;

class Float extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $this->correctedValue = (float) $this->inputValue;
    }
}
