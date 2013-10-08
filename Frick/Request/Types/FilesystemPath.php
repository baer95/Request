<?php

namespace Frick\Request\Types;

class FilesystemPath extends Type
{
    public function checkValue()
    {
        if (
            //Filesystem-Path-Check
            // Filesystem-Pfade haben meistens laufwerksbuchstaben oder ./ oder ../
            // gleiche bedingungen wie bei filename???
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
