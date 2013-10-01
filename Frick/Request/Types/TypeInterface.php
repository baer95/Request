<?php

namespace Frick\Request\Types;

interface TypeInterface
{
    public function __construct($value = null);
    public function setValue($value);
    public function getValue();

    public function setDoCorrection($correct);
    public function getDoCorrection();

    public function checkValue();

    public function getMatch();
}
