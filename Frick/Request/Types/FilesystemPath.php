<?php

namespace Frick\Request\Types;

class FilesystemPath extends Type
{
    public function checkValue()
    {
        if (
            //Filesystem-Path-Check
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
            //korrigieren, existenz prüfen?
        }
        return $this;
    }
}
