<?php

namespace Request\Types;

class Binary extends AbstractType
{
    public function checkValue()
    {
        //Binary-Check!
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
