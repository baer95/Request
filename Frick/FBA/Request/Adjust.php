<?php

namespace Frick\FBA\Request;

class Adjust
{
    public static function REQUEST_USERNAME($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_PASSWORD($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_EMAIL($i, $adjust = true)
    {
        $filtered = filter_var($i, FILTER_VALIDATE_EMAIL);
        // oder:
        $regex = "/^[a-zA-Z\d][\w\.-]*[a-zA-Z\d]@[a-zA-Z\d][\w\.-]*\.(?:[a-zA-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|travel|hotel|museum)$/i";
    }
    public static function REQUEST_BOOL($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_INT($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_NUMERIC($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_FLOAT($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_IPv4($input, $adjust = true)
    {
        $filtered = filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

        if ($filtered !== false) {
            return $filtered;
        } elseif ($adjust) {
            // Separate IP and Port
            if (stripos($input, ":") !== false) {
                $ip = stristr($input, ":", true);
                $port = stristr($input, ":", false);
            } else {
                $ip = $input;
                $port = null;
            }

            // Trim Whitespace and the ":" off the Port
            if ($port != null) {
                $port = (int) trim($port, " :\t\n\r\0\x0B");
                if ($port < 0) $port = 0;
                if ($port > 65535) $port = 65535;
            }

            // Disjoint the four parts of the IP-Adress
            $parts = explode(".", $ip);

            // Trim eventually existing whitespace off the Parts and typecast them as INT
            foreach ($parts as $key => &$part) {
                $part = (int) trim($part);
                if ($part < 0) $part = 0;
                if ($part > 255) $part = 255;
            }

            $ip = join(".", $parts);

            return ($port != null) ? $ip.":".$port : $ip;
        } else {
            return false;
        }
    }
    public static function REQUEST_IPv6($input, $adjust = true)
    {
        $filtered = filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);

        if ($filtered !== false) {
            return $filtered;
        } elseif ($adjust) {
            //
            // berichtigen
            //
        } else {
            return false;
        }
    }
    public static function REQUEST_JSON($input, $adjust = true)
    {
        json_decode($input);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $input;
        } elseif ($adjust) {
            return "{\r\t\"ErrorCode\": ".json_last_error().",\r\t\"ErrorMessage\": \"".json_last_error_msg()."\"\r}";
        } else {
            return false;
        }
    }
    public static function REQUEST_FILENAME($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_MIME($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_FILESIZE($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_WEBPATH($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_FSPATH($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_ARRAY($i, $adjust = true)
    {
        //
    }
    public static function REQUEST_BINARY($i, $adjust = true)
    {
        //
    }
}
