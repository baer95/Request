<?php

namespace Frick\Request\Types;

class String extends Type
{
    public function checkValue()
    {
        if (
            //String-Check
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
            // $this->value korrigieren.
        }
        return $this;
    }
}
