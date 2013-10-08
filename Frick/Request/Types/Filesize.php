<?php

namespace Frick\Request\Types;

class Filesize extends Type
{
    public function checkValue()
    {
        if (
            //Filesize-Check
            //kann int sein, kann aber auch string sein (2534 bytes usw.)
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
            //$this->value korrigieren
        }
        return $this;
    }
}
