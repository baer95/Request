<?php

namespace Frick\Request\Types;

class Password extends Type
{
    public function checkValue()
    {
        if (
            //Password-Check
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
