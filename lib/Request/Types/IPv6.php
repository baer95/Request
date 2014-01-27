<?php

// DEPRECATED

namespace Request\Types;

class IPv6 extends AbstractType
{
    public function checkValue()
    {
        // IPv6-Check
        filter_var($this->value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
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
            // Korrigieren
        }
        return $this;
    }
}
