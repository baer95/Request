<?php

// DEPRECATED

namespace Request\Interfaces;

interface TypeInterface
{
    public function __construct($value = null);

    public function setValue($value);
    public function getValue();

    public function setDoCorrection($correct);
    public function getDoCorrection();

    public function checkValue();
    public function correctValue();
    public function parseValue();

    public function getMatch();
}
