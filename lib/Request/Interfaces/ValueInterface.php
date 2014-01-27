<?php

namespace Request\Interfaces;

Interface ValueInterface
{
    public function __construct($value = false);

    public function setInputValue($value);
    public function getInputValue();

    public function setDefaultValue($value);
    public function getDefaultValue();

    public function doMatch();
    public function getMatch();

    public function doCorrection();
    public function getParsedValue();
}
