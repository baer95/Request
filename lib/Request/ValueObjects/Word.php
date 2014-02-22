<?php

namespace Request\ValueObjects;

class Word extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $wordRegex = "/[^a-zA-Zäöüß]+/imD";
        $this->correctedValue = preg_replace($wordRegex, "", $this->inputValue);
    }
}
