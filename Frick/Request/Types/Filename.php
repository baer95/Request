<?php

namespace Frick\Request\Types;

class Filename extends Type
{
    public function checkValue()
    {
        if (
            //Filename-Check, auf existenz prüfen?
            //Welche zeichen sind in Windows/OSX/UNIX verboten?
            //      Windows:    \/:*?"<>|
            //      OSX:        ?
            //      UNIX:       ?
            // Hier auch tags entfernen und sonderzeichen kodieren?
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
            // $this->value korrigieren
        }
        return $this;
    }
}
