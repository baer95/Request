<?php

namespace Frick\Request\Types;

class Filesize extends AbstractType
{
    public function checkValue()
    {
            //Filesize-Check
            //kann int sein, kann aber auch string sein ("2534b" usw.)
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
            //$this->value korrigieren
        }
        return $this;
    }
}
