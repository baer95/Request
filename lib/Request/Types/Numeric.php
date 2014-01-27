<?php

// DEPRECATED

namespace Request\Types;

class Numeric extends AbstractType
{
    public function checkValue()
    {
        if (is_numeric($this->value)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            // $this->value korrigieren.
            $numericReplaceRegex = "/^[^0-9]+$/";
            return preg_replace($numericReplaceRegex, "", $this->value);
        }
        return $this;
    }
}
