<?php

// AKTUELL

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
    public function doCorrection()
    {
        if (is_null($this->match)) {
            $this->doMatch();
        }
        if (!$this->match) {
            $this->parsedValue = $this->defaultValue;
        }
    }
}
