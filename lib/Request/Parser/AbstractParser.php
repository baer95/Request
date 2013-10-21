<?php

namespace Request\Parser;

abstract class AbstractParser implements \Request\Interfaces\ParserInterface
{
    protected $data = array();
    protected $types = array();

    abstract public function __construct();

    public function addData($key, $array)
    {
        if (array_key_exists($key, $this->data)) {
            throw new \Exception("Key already exists.", 1);
        } else {
            $this->data[$key] = $array;
        }
        return $this;
    }
    public function getData($key = null)
    {
        if (null !== $key) {
            return $this->data[$key];
        } else {
            return $this->data;
        }
    }
    public function setType($key, \Request\Interfaces\TypeInterface $type)
    {
        $this->types[$key] = $type;
        return $this;
    }
    public function getType($key = null)
    {
        if (null !== $key) {
            return $this->types[$key];
        } else {
            return $this->types;
        }
    }
    public function dataWalkRecursive($key, &$data, $types)
    {
        if (is_array($data)) {
            // Go deeper 1 level...
            foreach ($data as $key => &$data) {
                $this->dataWalkRecursive($key, $data, $types);
            }
        } else {
            // parse only values that have a defined type...
            if (array_key_exists($key, $types)) {
                $type = $types[$key];
                $type->setValue($data);
                $type->setDoCorrection(true);
                $type->parseValue();
                $data = $type->getValue();
            }
        }
    }
    public function parse()
    {
        $this->dataWalkRecursive(null, $this->data, $this->types);
        return $this;
    }
}
