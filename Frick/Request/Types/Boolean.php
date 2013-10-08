<?php

namespace Frick\Request\Types;

class Boolean extends AbstractType
{
    public function checkValue()
    {
        if (is_bool($this->value)) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            $this->value = (bool) $this->value;
        }
        return $this;
    }
}
