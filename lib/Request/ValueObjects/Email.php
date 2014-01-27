<?php

namespace Request\ValueObjects;

class Email extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $emailRegex = "/^[a-zA-Z\d][\w\.-]*[a-zA-Z\d]@[a-zA-Z\d][\w\.-]*\.(?:[a-zA-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|travel|hotel|museum)$/i";
        $result = preg_match($emailRegex, $this->inputValue);
        if ($result === 1) {
            $this->match = true;
        } elseif ($result === 0) {
            $this->match = false;
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
    }
}
