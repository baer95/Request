<?php

// AKTUELL

namespace Request\ValueObjects;

abstract class AbstractValue implements \Request\Interfaces\ValueInterface
{
    protected $inputValue = null;
    protected $defaultValue = null;
    protected $match = null;
    protected $parsedValue = null;

    public function __construct($value = false)
    {
        if ($value !== false) {
            $this->setInputValue($value);
        }
    }

    public function setInputValue($value)
    {
        $this->inputValue = $value;
    }
    public function getInputValue()
    {
        return $this->inputValue;
    }

    public function setDefaultValue($value)
    {
        $this->defaultValue = $value;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    abstract public function doMatch();

    public function getMatch()
    {
        return $this->match;
    }

    abstract public function doCorrection();

    public function getParsedValue()
    {
        return $this->parsedValue;
    }
}
