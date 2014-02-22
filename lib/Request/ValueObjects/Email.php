<?php

namespace Request\ValueObjects;

class Email extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
            //match an email-adress
        // $emailRegex = "/^[a-zA-Z\d][\w\.-]*[a-zA-Z\d]@[a-zA-Z\d][\w\.-]*\.(?:[a-zA-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|travel|hotel|museum)$/i";
        // $result = preg_match($emailRegex, $this->inputValue);

        $atPos = strpos($this->inputValue, "@");

        $beforeAt = substr($this->inputValue, 0, $atPos);
        $afterAt = substr($this->inputValue, $atPos+1);

        $beforeAt = preg_replace("/[^a-z0-9]+[^a-z0-9\._]*[^a-z0-9]+/miD", "", $beforeAt);
        $afterAt  = preg_replace("/[^a-z0-9]+[^a-z0-9\._]*[^a-z0-9]+/miD", "", $afterAt);

        $this->correctedValue = $beforeAt . "@" . $afterAt;
    }
}
