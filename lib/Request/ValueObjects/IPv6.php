<?php

namespace Request\ValueObjects;

class IPv6 extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $position = stripos($this->inputValue, "]");
        if ($position === false) {    // Keine schließende Klammer gefunden
            $this->match = filter_var($this->inputValue, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false ? false : true;
        } else {    // Schließende Klammer --> Möglicherweise mit Port
            $ip = substr($this->inputValue, 0, $position+1);
            $ip = trim($ip, "[]");

            $port = substr($this->inputValue, $position+1);
            $port = ltrim($port, ":");

            $validate_ip = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false ? false : true;
            $validate_port = is_numeric($port);

            $this->match = $validate_ip AND $validate_port ? true : false;
        }
    }
}
