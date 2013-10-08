<?php

namespace Frick\Request\Types;

class IPv6 extends Type
{
    public function checkValue()
    {
        if (
            // IPv6-Check
            filter_var($this->value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
            ) {
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
