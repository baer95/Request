<?php

// DEPRECATED

namespace Request\Types;

class Integer extends AbstractType
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
            $this->correctedValue = (int) $this->value;
        }
        return $this;
    }
}
