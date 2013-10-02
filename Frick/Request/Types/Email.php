<?php

namespace Frick\Request\Types;

class Email extends Type
{
    public function checkValue()
    {
        $eMailRegex = "/^[a-z]{1,}$/i";
        $match = preg_match($eMailRegex, $this->value);
        if ($match === 1) {
            $this->match = true;
        } elseif ($match === 0) {
            $this->match = false;
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            //$this->value korrigieren
        }
        return $this;
    }
}
