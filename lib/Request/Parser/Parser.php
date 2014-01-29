<?php

namespace Request\Parser;

class Parser implements \Request\Interfaces\ParserInterface
{
    protected $inputValueArray = array();
    protected $valueObjectArray = array();

    public function __construct($array)
    {
        $this->setInputValueArray($array);
    }

    public function setInputValueArray($array)
    {
        $this->inputValueArray = $array;
        return $this;
    }

    public function getInputValue($key)
    {
        return $this->valueObjectArray[$key]->getInputValue();
    }

    public function getInputValueArray()
    {
        $inputValueArray = array();

        foreach ($this->valueObjectArray as $key => $valueObject) {
            $inputValueArray[$key] = $valueObject->getInputValue();
        }

        return $inputValueArray;
    }

    public function setType($key, \Request\Interfaces\ValueInterface $valueObject)
    {
        $valueObject->setInputValue($this->inputValueArray[$key]);
        $this->valueObjectArray[$key] = $valueObject;
        return $this;
    }

    public function getType($key)
    {
        return get_class($this->valueObjectArray[$key]);
    }

    public function setDefaultValue($key, $defaultValue)
    {
        $this->valueObjectArray[$key]->setDefaultValue($defaultValue);
        return $this;
    }

    public function getDefaultValue($key)
    {
        return $this->valueObjectArray[$key]->getDefaultValue();
    }

    public function parseValues()
    {
        foreach ($this->valueObjectArray as $key => $valueObject) {
            $valueObject->doMatch();
            $valueObject->doCorrection();
        }
        return $this;
    }

    public function getValueObject($key)
    {
        return $this->valueObjectArray[$key];
    }

    public function getMatch($key)
    {
        return $this->valueObjectArray[$key]->getMatch();
    }

    public function getMatchArray()
    {
        $matchArray = array();

        foreach ($this->valueObjectArray as $key => $valueObject) {
            $matchArray[$key] = $valueObject->getMatch();
        }

        return $matchArray;
    }

    public function getParsedValue($key)
    {
        return $this->valueObjectArray[$key]->getParsedValue();
    }

    public function getParsedValueArray()
    {
        $parsedValueArray = array();

        foreach ($this->valueObjectArray as $key => $valueObject) {
            $parsedValueArray[$key] = $valueObject->getParsedValue();
        }

        return $parsedValueArray;
    }
}
