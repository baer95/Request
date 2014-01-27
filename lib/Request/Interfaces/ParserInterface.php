<?php

namespace Request\Interfaces;

interface ParserInterface
{
    public function __construct($array);

    public function setInputValueArray($array);
    public function getInputValue($key);

    public function setType($key, \Request\Interfaces\ValueInterface $type);
    public function getType($key);

    public function setDefaultValue($key, $defaultValue);
    public function getDefaultValue($key);

    public function parseValues();

    public function getValueObject($key);

    public function getMatch($key);
    public function getMatchArray();

    public function getParsedValue($key);
    public function getParsedValueArray();
}
