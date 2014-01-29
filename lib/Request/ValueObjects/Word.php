<?php

namespace Request\ValueObjects;

class Word extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $wordRegex = "/^[a-zA-Z]+$/i";
        $match = preg_match($wordRegex, $this->value);
        if ($match === 1) {
            $this->match = true;
        } elseif ($match === 0) {
            $this->match = false;
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
    }
}
