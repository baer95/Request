<?php

// DEPRECATED

namespace Request\Types;

class FilesystemPath extends AbstractType
{
    public function checkValue()
    {
            //Filesystem-Path-Check
            // Filesystem-Pfade haben meistens laufwerksbuchstaben oder ./ oder ../
            // gleiche bedingungen wie bei filename???
        if (false) {
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
