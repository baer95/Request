<?php

namespace Frick\Request\Types;

class Json extends Type
{
    public function checkValue()
    {
        json_decode($this->value);
        if (json_last_error() === JSON_ERROR_NONE) {
            $this->match = true;
        } else {
            $this->match = false;
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            // $this->value korrigieren.
        }
        return $this;
    }
}
