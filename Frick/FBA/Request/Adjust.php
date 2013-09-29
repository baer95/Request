<?php

namespace Frick\Request;

// das richtige
// das berichtigte
// oder null

class Adjust
{
    /**
     * REQUEST_BOOL
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_BOOL($input, $adjust = true)
    {
        if (is_bool($input)) {
            return $input;
        } elseif ($adjust) {
            return (bool) $input;
        } else {
            return null;
        }
    }

    /**
     * REQUEST_JSON
     *
     * If you are worried about the Content of the JSON-Array, simply json_decode() it and set as a userDefinedArray.
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_JSON($input, $adjust = true)
    {
        json_decode($input);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $input;
        } elseif ($adjust) {
            return "{\r\t\"ErrorCode\": ".json_last_error().",\r\t\"ErrorMessage\": \"".json_last_error_msg()."\"\r}";
        } else {
            return null;
        }
    }

    /**
     * REQUEST_INT
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_INT($input, $adjust = true)
    {
        if (is_int($input)) {
            return $input;
        } elseif ($adjust) {
            return (int) $input;
        } else {
            return null;
        }
    }

    /**
     * REQUEST_PASSWORD
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The crypted or untouched input-value.
     */
    public static function REQUEST_PASSWORD($input, $adjust = true)
    {
        if ($adjust) {
            return password_hash($input, PASSWORD_DEFAULT, ["cost" => 12]);
        } else {
            return $input;
        }
    }

    /**
     * REQUEST_USERNAME
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_USERNAME($input, $adjust = true)
    {
        $usernameRegex = "/^[a-zA-Z\d\.\-\_@]{8,}$/i";
        $usernameReplaceRegex = "/[^a-zA-Z\d\.\-\_@]+/i";
        $match = preg_match($usernameRegex, $input);
        if ($match === 1) {
            return $input;
        } elseif ($match === 0) {
            if ($adjust) {
                return mb_strtolower(preg_replace($usernameReplaceRegex, "", $input));
            } else {
                return null;
            }
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
    }

    // ########################################################

    /**
     * REQUEST_EMAIL
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_EMAIL($i, $adjust = true)
    {
        // Was erlaubt ist, is ja eigentlich eh klar, was die definition einer E-Mail-Addresse halt vorgibt!

        // $filtered = filter_var($i, FILTER_VALIDATE_EMAIL);
        $emailRegex = "/^[a-zA-Z\d][\w\.-]*[a-zA-Z\d]@[a-zA-Z\d][\w\.-]*\.(?:[a-zA-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|travel|hotel|museum)$/i";
        $matches = array();
        $result = preg_match($emailRegex, $i, $matches);
        if ($result === 0) {
            if ($adjust) {
                //
                // berichtigen mit Hilfe von $matches
                //
            } else {
                return null;
            }
        } elseif ($result === 1) {
            return $i;
        } else {
            throw new \Exception("Sxntax Error in Regular Expression.", 1);
        }
    }

    /**
     * REQUEST_STRING
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_STRING($i, $adjust = true)
    {
        // Tags entfernen
        // sonderzeichen kodieren
        // anführungszeichen escapen
        // ...
    }

    /**
     * REQUEST_NUMERIC
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_NUMERIC($i, $adjust = true)
    {
        // Numeric: Zahl, die als string codiert ist.
        // Was hier zu tun ist muss ich erst herausfinden...
    }

    /**
     * REQUEST_FLOAT
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_FLOAT($i, $adjust = true)
    {
        // eigentlich problemlos, da ein FLOAT ja definiert und überprüfbar ist.
        // überprüfen ob is_float genügt, was tun beim berichtigen?
    }

    /**
     * REQUEST_IPv4
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_IPv4($input, $adjust = true)
    {
        // Definition etwas kompliziert und schwer zu überprüfen, wenn auf einen Port auch geachtet werden soll...

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

    /**
     * REQUEST_IPv6
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_IPv6($input, $adjust = true)
    {
        // Definition SEHR kompliziert und schwer zu überprüfen...

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

    /**
     * REQUEST_FILENAME
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_FILENAME($i, $adjust = true)
    {
        // Welche zeichen sind in Windows/OSX/UNIX verboten?
        //      Windows:    \/:*?"<>|
        //      OSX:        ?
        //      UNIX:       ?
        // Hier auch tags entfernen und sonderzeichen kodieren?
    }

    /**
     * REQUEST_MIME
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_MIME($input, $adjust = true)
    {
        $mimeRegex = "/^[a-z\d]+[\/]{1}[a-z]{1}[a-z\d\.-]+$/i";
        $match = preg_match($mimeRegex, $input);
        if ($match === 1) {
            return $input;
        } elseif ($match === 0) {
            if ($adjust) {
                // berichtigen? wie?
            } else {
                return null;
            }
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
    }

    /**
     * REQUEST_FILESIZE
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_FILESIZE($i, $adjust = true)
    {
        // sollte ein INT sein, was tun wenn byte o.ä. am ende dabei steht (string)?

        if (is_int($i)) {
            return $i;
        } elseif ($adjust) {
            return (int) $i;
        } else {
            return false;
        }
    }

    /**
     * REQUEST_WEBPATH
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_WEBPATH($i, $adjust = true)
    {
        // Welche Zeichen dürfen in einem Webpath/Domain vorhanden sein? (auf zeichenkodierung achten: leer -> %20 usw.)
        // Auf korrektheit mit protokoll usw. kontrollieren?
        // Ähnliche Bedingungen wie bei Filename???
    }

    /**
     * REQUEST_FSPATH
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_FSPATH($i, $adjust = true)
    {
        // Filesystem-Pfade haben meistens laufwerksbuchstaben oder ./ oder ../
        // gleiche bedingungen wie bei filename???
        return $i;
    }

    /**
     * REQUEST_ARRAY
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_ARRAY($i, $adjust = true)
    {
        // Prüft nur ob $i ein array im sinne von PHP ist, wenn inhalt gefahr darstellen könnte, dann einfach als user-defined array angeben und werte parsen.
        if (is_array($i)) {
            return $i;
        } elseif ($adjust) {
            return array($i);
        } else {
            return false;
        }
    }

    /**
     * REQUEST_BINARY
     *
     * @param   mixed   $input  The Value that should be parsed.
     * @param   boolean $adjust Should the value be corrected to match the type?
     * @return                  The input-value or null.
     */
    public static function REQUEST_BINARY($i, $adjust = true)
    {
        // Ist diese Funktion sinnvoll?
        // Z.B. Einlesen einer Datei die ein User hochgeladen hat... (nur wenn keine Textdatei...)
    }
}
