<?php

namespace Request\Types;

class Word extends AbstractType
{
    public function checkValue()
    {
        $wordRegex = "/^[a-zA-Z]+$/i";
        $match = preg_match($wordRegex, $this->value);
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
            $wordReplaceRegex = "/^[^a-zA-Z]+$/i";
            $this->value = preg_replace($wordReplaceRegex, "", $this->value);
        }
        return $this;
    }
}
