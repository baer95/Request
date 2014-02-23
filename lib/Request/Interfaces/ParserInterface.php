<?php

namespace Request\Interfaces;

interface ParserInterface
{
    public function __construct($array);

    public function setInputValueArray($array);
    public function getInputValue($key);
    public function getInputValueArray();

    public function setType($key, \Request\Interfaces\ValueInterface $valueObject);
    public function getType($key);

    public function setDefaultValue($key, $defaultValue);
    public function getDefaultValue($key);
    public function resetDefaultValue($key);

    public function getCorrectedValue($key);
    public function getCorrectedValueArray();

    public function getOutputValue($key);
    public function getOutputValueArray();

    public function getMatch($key);
    public function getMatchArray();

    public function getValueObject($key);

    public function execute();
}
