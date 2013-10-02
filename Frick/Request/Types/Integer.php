<?php

namespace Frick\Request\Types;

class Integer extends Type
{
    public function checkValue()
    {
        if (is_int($this->value)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            $this->value = (int) $this->value;
        }
        return $this;
    }
}
