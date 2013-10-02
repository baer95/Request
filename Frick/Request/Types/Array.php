<?php

namespace Frick\Request\Types;

class Array extends Type
{
    public function checkValue()
    {
        if (is_array($this->value)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            $this->value = array($this->value);
        }
        return $this;
    }
}
