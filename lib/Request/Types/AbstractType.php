<?php

namespace Request\Types;

abstract class AbstractType implements \Request\Interfaces\TypeInterface
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

    abstract public function correctValue();

    public function parseValue()
    {
        $this->checkValue();
        if (!$this->match && $this->doCorrection) {
            $this->correctValue();
        }
        return $this;
    }

    public function getMatch()
    {
        return $this->match;
    }
}
