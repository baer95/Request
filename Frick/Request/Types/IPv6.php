<?php

namespace Frick\Request\Types;

class IPv6 extends Type
{
    public function checkValue()
    {
        if (
            // IPv6-Check
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
