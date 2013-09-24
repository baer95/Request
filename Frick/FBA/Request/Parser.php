<?php

namespace Frick\FBA\Request;

/**
 * Parser-Class
 */
class Parser
{
    private $userDefinedArrays = array();

    private $userVarTypes = array();
    private $getVarTypes = array();
    private $postVarTypes = array();
    private $cookieVarTypes = array();
    private $filesVarTypes = array();

    private $classConstants = array(
         1 => "REQUEST_USERNAME",
         2 => "REQUEST_PASSWORD",
         3 => "REQUEST_EMAIL",
         4 => "REQUEST_BOOL",
         5 => "REQUEST_INT",
         6 => "REQUEST_NUMERIC",
         7 => "REQUEST_FLOAT",
         8 => "REQUEST_IPv4",
         9 => "REQUEST_IPv6",
        10 => "REQUEST_JSON",
        11 => "REQUEST_FILENAME",
        12 => "REQUEST_MIME",
        13 => "REQUEST_FILESIZE",
        14 => "REQUEST_WEBPATH",
        15 => "REQUEST_FSPATH",
        16 => "REQUEST_ARRAY"
    );

    /**
     * __construct
     *
     * Creates the Class-Constants.
     */
    public function __construct()
    {
        foreach ($this->classConstants as $key => $name) {
            define($name, $key);
        }

        $this->setFilesVarTypes("name", REQUEST_FILENAME);
        $this->setFilesVarTypes("type", REQUEST_MIME);
        $this->setFilesVarTypes("size", REQUEST_FILESIZE);
        $this->setFilesVarTypes("tmp_name", REQUEST_FSPATH);
        $this->setFilesVarTypes("error", REQUEST_INT);
    }

    /**
     * This method is used to specify one or more additional Arrays that should be parsed.
     *
     * @param   mixed   $key    A Key do identify a User-specified Array.
     * @param   array   $array  An Array that should be parsed.
     * @return  object          The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function addUserDefinedArray($arrayKey, $array)
    {
        if (!is_array($array)) return false;
        $this->userDefinedArrays[$arrayKey] = $array;
        return $this;
    }

    /**
     * This Method returns an array specified by the $key-Parameter.
     * @param   mixed   $key    Specify the Array you want to get back from $userDefinedArrays.
     * @return  array           The Array corresponding to the key $key in $userDefinedArrays.
     */
    public function getUserDefinedArray($arrayKey)
    {
        return $this->userDefinedArrays[$arrayKey];
    }

    /**
     * Use this Method to set some Types of values in the a user-Defined Array.
     *
     * @param   mixed     $arrayKey   The Key that specifies the Array in which you want do define Value-Types.
     * @param   string    $key        Specify a Key in a User-Defined Array.
     * @param   integer   $type       An Integer that specifies the Type of the Value associated with the given key.
     * @return  object                The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function setUserVarType($arrayKey, $key, $type)
    {
        $this->userVarTypes[$arrayKey][$key] = $type;
        return $this;
    }

    /**
     * This Method returns all defined types for the user-defined arrays.
     * @param   boolean $toString   Whether the output should be an array or string (JSON).
     * @return  mixed               A string or array representing the defined value-types for all user-defined arrays.
     */
    public function getUserVarTypes($toString = false)
    {
        if ($toString) {
            return json_encode($this->userVarTypes);
        } else {
            return $this->userVarTypes;
        }
    }

    /**
     * Use this Method to set some Types of values in the GET-Array.
     *
     * @param   string  $key    Specify a Key in the GET-Array
     * @param   integer $type   A Integer that specifies the Type of the Value associated with the given key.
     * @return  object          The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function setGetVarType($key, $type)
    {
        $this->getVarTypes["key"] = $type;
        return $this;
    }

    /**
     * Returns the getVarTypes-Array.
     *
     * @param   bool    $toString   Whether the output should be an array or string (JSON).
     * @return  array               The Array that holds all user-specified Types for Values in the GET-Array.
     */
    public function getGetVarTypes($toString = false)
    {
        if ($toString) {
            return json_encode($this->getVarTypes);
        } else {
            return $this->getVarTypes;
        }
    }

    /**
     * Use this Method to set some Types of values in the POST-Array.
     * @param   string  $key    Specify a Key in the POST-Array
     * @param   integer $type   A Integer that specifies the Type of the Value associated with the given key.
     * @return  object          The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function setPostVarType($key, $type)
    {
        $this->postVarTypes["key"] = $type;
        return $this;
    }

    /**
     * Returns the postVarTypes-Array.
     *
     * @param   bool    $toString   Whether the output should be an array or string (JSON).
     * @return  array               The Array that holds all user-specified Types for Values in the POST-Array.
     */
    public function getPostVarTypes($toString = false)
    {
        if ($toString) {
            return json_encode($this->postVarTypes);
        } else {
            return $this->postVarTypes;
        }
    }

    /**
     * Use this Method to set some Types of values in the COOKIE-Array.
     * @param   string  $key    Specify a Key in the COOKIE-Array
     * @param   integer $type   A Integer that specifies the Type of the Value associated with the given key.
     * @return  object          The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function setCookieVarType($name, $type)
    {
        $this->cookieVarTypes[$name] = $type;
        return $this;
    }

    /**
     * Returns the cookieVarTypes-Array.
     *
     * @param   bool    $toString   Whether the output should be an array or string (JSON).
     * @return mixed                An Array or JSON-String.
     */
    public function getCookieVarTypes($toString = false)
    {
        if ($toString) {
            return json_encode($this->cookieVarTypes);
        } else {
            return $this->cookieVarTypes;
        }
    }

    /**
     * Use this Method to set some Types of values in the FILES-Array.
     * @param   string  $key    Specify a Key in the FILES-Array
     * @param   integer $type   A Integer that specifies the Type of the Value associated with the given key.
     * @return  object          The Instance that is currently worked on. Used for Method-Chaining.
     */
    private function setFilesVarTypes($key, $type)
    {
        $this->filesVarTypes[$key] = $type;
        return $this;
    }

    //####################################################

    /**
     * This Method walks through an Array and parses the Values using the Adjust-Class to match the given Types.
     * @param   array   $Array  //
     * @return  object          The Instance that is currently worked on. Used for Method-Chaining.
     */
    private function parse($dataArray, $typesArray)
    {
        if(!is_array($dataArray)) return false;
        if(!is_array($typesArray)) return false;

        foreach ($dataArray as $key => &$value) {
            // Parse only Values that have a user-defined type:
            if (array_key_exists($key, $typesArray)) {
                $type = $this->classConstants[$typesArray[$key]];
                $value = \Frick\FBA\Request\Adjust::$type($value, $adjust = true);
            }
        }

        return $array;
    }

    //####################################################

    /**
     * This Method applies the parse()-Method to the the USER-Arrays.
     * @return  object  The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function parse_USER()
    {
        foreach ($this->userDefinedArrays as $key => &$userDefinedArray) {
            $userDefinedArray = $this->parse($userDefinedArray, $this->userVarTypes[$key]);
        }
        return $this;
    }

    /**
     * This Method applies the parse()-Method to the GET-Array.
     * @return  object  The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function parse_GET()
    {
        $_GET = $this->parse($_GET, $this->getVarTypes);
        return $this;
    }

    /**
     * This Method applies the parse()-Method to the POST-Array.
     * @return  object  The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function parse_POST()
    {
        $_POST = $this->parse($_POST, $this->postVarTypes);
        return $this;
    }

    /**
     * This Method applies the parse()-Method to the COOKIE-Array.
     * @return  object  The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function parse_COOKIE()
    {
        $_COOKIE = $this->parse($_COOKIE, $this->cookieVarTypes);
        return $this;
    }

    /**
     * This Method applies the parse()-Method to the FILE-Array.
     * @return  object  The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function parse_FILES()
    {
        foreach ($_FILES as $tagName => &$fileArray) {
            $fileArray = $this->parse($fileArray, $this->filesVarTypes);
        }
        return $this;
    }

    /**
     * parse_ALL executes all parse_*-Methods except the parse_USER.
     *
     * @return  object  The Instance that is currently worked on. Used for Method-Chaining.
     */
    public function parse_ALL()
    {
        $this->parse_GET();
        $this->parse_POST();
        $this->parse_COOKIE();
        $this->parse_FILES();
        return $this;
    }
}
