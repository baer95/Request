<?php

namespace Frick\Request\Types;

class Float extends Type
{
    public function checkValue()
    {
        if (is_float($this->value)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            $this->value = (float) $this->value;
        }
        return $this;
    }
}
