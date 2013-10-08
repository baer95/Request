<?php

namespace Frick\Request\Types;

class MimeType extends AbstractType
{
    public function checkValue()
    {
        $mimeRegex = "/^[a-z\d]+[\/]{1}[a-z]{1}[a-z\d\.-]+$/i";
        $match = preg_match($mimeRegex, $this->value);
        if ($match === 1) {
            $this->match = true;
        } elseif ($match === 0) {
            $this->match = false;
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            // $this->value korrigieren.
            return "multipart";
        }
        return $this;
    }
}
