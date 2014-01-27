<?php

// DEPRECATED

namespace Request\Types;

class IPv4 extends AbstractType
{
    public function checkValue()
    {
        // IPv4-Check
        filter_var($this->value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        if (false) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            // $this->value korrigieren

            // Separate IP and Port
            // if (stripos($input, ":") !== false) {
            //     $ip = stristr($input, ":", true);
            //     $port = stristr($input, ":", false);
            // } else {
            //     $ip = $input;
            //     $port = null;
            // }

            // // Trim Whitespace and the ":" off the Port
            // if ($port != null) {
            //     $port = (int) trim($port, " :\t\n\r\0\x0B");
            //     if ($port < 0) $port = 0;
            //     if ($port > 65535) $port = 65535;
            // }

            // // Disjoint the four parts of the IP-Adress
            // $parts = explode(".", $ip);

            // // Trim eventually existing whitespace off the Parts and typecast them as INT
            // foreach ($parts as $key => &$part) {
            //     $part = (int) trim($part);
            //     if ($part < 0) $part = 0;
            //     if ($part > 255) $part = 255;
            // }

            // $ip = join(".", $parts);

            // return ($port != null) ? $ip.":".$port : $ip;
            //$this->correctedValue = $corrected;
        }
        return $this;
    }
}
