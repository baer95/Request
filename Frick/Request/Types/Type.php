<?php

namespace Frick\Request\Types;

abstract class Type implements TypeInterface
{
    public $value = null;
    public $doCorrection = true;
    public $match = null;

    public function __construct($value = null)
    {
        if (null !== $value) {
            $this->value = $value;
        }
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setDoCorrection($correct)
    {
        $this->doCorrection = (bool) $correct;
        return $this;
    }

    public function getDoCorrection()
    {
        return $this->doCorrection;
    }

    abstract public function checkValue();

    public function getMatch()
    {
        return $this->match;
    }
}
