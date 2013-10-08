<?php

namespace Frick\Request\Types;

class Username extends Type
{
    public function checkValue()
    {
        $usernameRegex = "/^[a-zA-Z\d\.\-\_@]{8,}$/i";
        $match = preg_match($usernameRegex, $input);
        if ($match === 1) {
            $this->match = true;
        } elseif ($match === 0) {
            $this->match = false;
        } else {
            throw new \Exception("Syntax Error in Regular Expresion.", 1);
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            // $this->value korrigieren.
            $usernameReplaceRegex = "/[^a-zA-Z\d\.\-\_@]+/i";
            $this->value = mb_strtolower(preg_replace($usernameReplaceRegex, "", $this->value));
        }
        return $this;
    }
}
