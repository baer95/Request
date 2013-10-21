<?php

namespace Request\Types;

class Webpath extends AbstractType
{
    public function checkValue()
    {
            //Webpath-Check
            // Welche Zeichen dürfen in einem Webpath/Domain vorhanden sein? (auf zeichenkodierung achten: leer -> %20 usw.)
            // Auf korrektheit mit protokoll usw. kontrollieren?
            // Ähnliche Bedingungen wie bei Filename???
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
            // $this->value korrigieren.
        }
        return $this;
    }
}
