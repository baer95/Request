<?php

namespace Frick\Request\Types;

class HTML5 extends Type
{
    public function checkValue()
    {
        if (
            //HTML5-Check!
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
            // $this->value korrigieren!
        }
        return $this;
    }
}
