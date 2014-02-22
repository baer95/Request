<?php

namespace Request\ValueObjects;

class Integer extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $int = preg_replace("/[^0-9]+/imD", "", $this->inputValue);
        $this->correctedValue = (int) $int;
    }
}
