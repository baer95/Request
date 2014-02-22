<?php

namespace Request\ValueObjects;

class Digits extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $pattern = "/[^0-9]+/imD";
        $this->correctedValue = preg_replace($pattern, "", $this->inputValue);
    }
}
