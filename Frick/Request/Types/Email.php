<?php

namespace Frick\Request\Types;

class Email extends Type
{
    public function checkValue()
    {
        $eMailRegex = "/^[a-z]{1,}$/i";
        $match = preg_match($eMailRegex, $this->value);
        $this->match = false;
    }
}
