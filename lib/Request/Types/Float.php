<?php

namespace Request\Types;

class Float extends AbstractType
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
            $this->correctedValue = (float) $this->value;
        }
        return $this;
    }
}