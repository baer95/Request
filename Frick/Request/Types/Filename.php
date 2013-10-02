<?php

namespace Frick\Request\Types;

class Filename extends Type
{
    public function checkValue()
    {
        if (
            //Filename-Check, auf existenz prüfen?
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
            // $this->value korrigieren
        }
        return $this;
    }
}
