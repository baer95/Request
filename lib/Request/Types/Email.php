<?php

namespace Request\Types;

class Email extends AbstractType
{
    public function checkValue()
    {
        $emailRegex = "/^[a-zA-Z\d][\w\.-]*[a-zA-Z\d]@[a-zA-Z\d][\w\.-]*\.(?:[a-zA-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|travel|hotel|museum)$/i";
        $result = preg_match($emailRegex, $this->value);
        if ($result === 1) {
            $this->match = true;
        } elseif ($result === 0) {
            $this->match = false;
        } else {
            throw new \Exception("Syntax Error in Regular Expression.", 1);
        }
        return $this;
    }
    public function correctValue()
    {
        if (!$this->match && $this->doCorrection) {
            //$this->value korrigieren
            //
        }
        return $this;
    }
}
