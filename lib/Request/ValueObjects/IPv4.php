<?php

namespace Request\ValueObjects;

class IPv4 extends \Request\ValueObjects\AbstractValue implements \Request\Interfaces\ValueInterface
{
    public function doCorrection()
    {
        $portPosition = stripos($this->inputValue, ":");

        if ($portPosition === false) {
            // es gibt keinen port
            $ip = $this->inputValue;
            $port = false;
        } else {
            // es gibt einen port, also wegschneiden
            $ip = substr($this->inputValue, 0, $portPosition);
            $port = substr($this->inputValue, $portPosition + 1);
        }

            // IP korrigieren
        $parts = explode(".", trim($ip));
        foreach ($parts as &$part) {
            $part = (int) trim($part);
            if ($part < 0 OR $part > 255) {
                $part = 1;
            }
        }

        $countPart = count($parts);

        if ($countPart > 4) {
            $parts = array_slice($parts, 0, 4);
        } elseif ($countPart < 4) {
            $parts = array_pad($parts, 4, 1);
        }

        $ip = implode(".", $parts);

            // Port berichtigen
        if ($port !== false) {
            $port = (int) trim($port);
            if ($port > 65535 OR $port < 0 ) {
                $port = 0;
            }
        }

        $this->correctedValue = $port === false ? $ip : $ip.":".$port;
    }
}
