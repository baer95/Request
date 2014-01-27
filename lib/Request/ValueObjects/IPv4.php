<?php

namespace Request\ValueObjects;

class IPv4 extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doMatch()
    {
        $position = stripos($this->inputValue, ":");

        if ($position === false) {
            // kein Doppelpunkt --> kein Port
            $this->match = (filter_var($this->inputValue, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) ? false : true;
        } else {
            // Doppelpunkt --> Port
            $filtered_ip = filter_var(substr($this->inputValue, 0, $position), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

            $port = substr($this->inputValue, $position + 1);
            $filtered_port = is_numeric($port);
            if ($filtered_port) {
                $port = (int) $port;
                $range = ($port <= 65535 AND $port >= 0) ? true : false;
            }
            $this->match = ($filtered_ip !== false AND $filtered_port AND $range) ? true : false;
        }
    }
}
