<?php

namespace Frick\Request\Types;

class Password extends AbstractType
{
    public function checkValue()
    {
        if (strlen($this->value) >= 8) {
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
            $this->value = password_hash(str_repeat($this->value, ceil(8/strlen($this->value))), PASSWORD_DEFAULT, ["cost" => 12]);
        }
        return $this;
    }
}


