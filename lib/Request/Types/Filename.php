<?php

// DEPRECATED

namespace Request\Types;

class Filename extends AbstractType
{
    public function checkValue()
    {
            //Filename-Check, auf existenz prüfen?
            //Welche zeichen sind in Windows/OSX/UNIX verboten?
            //      Windows:    \/:*?"<>|
            //      OSX:        ?
            //      UNIX:       ?
            // Hier auch tags entfernen und sonderzeichen kodieren?
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
            // $this->value korrigieren
        }
        return $this;
    }
}
