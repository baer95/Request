<?php

namespace Frick\Request\Types;

class HTML5 extends AbstractType
{
    public function checkValue()
    {
        //HTML5-Check!
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
            // $this->value korrigieren!
        }
        return $this;
    }
}
