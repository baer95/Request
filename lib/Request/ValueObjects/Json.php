<?php

namespace Request\ValueObjects;

class Json extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        json_decode($this->inputValue);
        $this->match = json_last_error() === JSON_ERROR_NONE ? true : false;
    }
}
