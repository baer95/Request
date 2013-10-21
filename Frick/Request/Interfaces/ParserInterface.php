<?php

namespace Frick\Request\Interfaces;

interface ParserInterface
{
    public function __construct();

    public function addData($key, $array);
    public function getData($key = null);

    public function setType($key, \Frick\Request\Interfaces\TypeInterface $type);
    public function getType($key = null);

    public function dataWalkRecursive($key, &$data, $types);

    public function parse();
}

