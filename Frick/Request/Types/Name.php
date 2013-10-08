<?php

namespace Frick\Request\Types;

class Name extends AbstractType
{
    public function checkValue()
    {
        $nameRegex = "/^[a-zA-ZäöüÄÖÜß\-]+$/";
        $match = preg_match($nameRegex, $this->value);
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
            // $this->value korrigieren.
            $nameReplaceRegex = "/^[^a-zA-ZäöüÄÖÜß\-]+$/";
            $this->value = preg_replace($nameReplaceRegex, "", $this->value);
        }
        return $this;
    }
}
