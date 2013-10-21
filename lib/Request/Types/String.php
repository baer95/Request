<?php

namespace Request\Types;

class String extends AbstractType
{
    public function checkValue()
    {
            //String-Check
            // Tags entfernen ?
            // Entities / specialchars ?
            // Quotes escapen ?
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
            // $this->value korrigieren.
        }
        return $this;
    }
}
