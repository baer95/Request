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
        if (array_key_exists($key, $this->inputValueArray)) {
            $valueObject->setInputValue($this->inputValueArray[$key]);
        } else {
            $valueObject->setInputValue(false);
        }

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

    public function resetDefaultValue($key)
    {
        $this->valueObjectArray[$key]->resetDefaultValue();
    }

    public function getCorrectedValue($key)
    {
        return $this->valueObjectArray[$key]->getCorrectedValue();
    }

    public function getCorrectedValueArray()
    {
        $correctedValueArray = array();

        foreach ($this->valueObjectArray as $key => $valueObject) {
            $correctedValueArray[$key] = $valueObject->getCorrectedValue();
        }

        return $correctedValueArray;
    }

    public function getOutputValue($key)
    {
        return $this->valueObjectArray[$key]->getOutputValue();
    }

    public function getOutputValueArray()
    {
        $outputValueArray = array();

        foreach ($this->valueObjectArray as $key => $valueObject) {
            $outputValueArray[$key] = $valueObject->getOutputValue();
        }

        return $outputValueArray;
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

    public function getValueObject($key)
    {
        return $this->valueObjectArray[$key];
    }

    public function execute()
    {
        foreach ($this->valueObjectArray as $key => $valueObject) {
            $valueObject->execute();
        }
    }
}
