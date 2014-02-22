<?php

namespace Request\ValueObjects;

class Username extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $usernameRegex = "/[^1a-zA-Z\d\.\-\_@]+/imD";
        $this->correctedValue = preg_replace($usernameRegex, "", $this->inputValue);
    }
}
