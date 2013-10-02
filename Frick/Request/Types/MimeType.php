<?php

namespace Frick\Request\Types;

class MimeType extends Type
{
    public function checkValue()
    {
        if (
            // MIME-Check
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
            // $this->value korrigieren.
        }
        return $this;
    }
}
