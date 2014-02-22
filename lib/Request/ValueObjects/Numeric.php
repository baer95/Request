<?php

namespace Request\ValueObjects;

class Numeric extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        // Mögliche Bestandteile eines numerischen Strings
        //  - optionales Vorzeichen +-
        //  - Ziffern 0-9
        //  - optionaler Dezimalteil
        //  - optionaler Exponentialteil

        $pattern = "/[^+\-0-9\.,e]+/imD";
        $this->correctedValue = preg_replace($pattern, "", $this->inputValue);
    }
}
