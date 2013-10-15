<?php

namespace Frick\Request;

/**
 * This class blablabla.
 *
 *
 * @author Bernhard Frick <bernhard.frick@gmx.at>
 */
class Parser
{
    protected $data = array();
    protected $types = array();

    protected $data_FILES = null;
    protected $types_FILES = null;
    protected $doParseFiles = true;

    public function __construct()
    {
        $this->addData('_GET', $_GET);
        $this->addData('_POST', $_POST);
        $this->addData('_COOKIE', $_COOKIE);

        $this->data_FILES = $_FILES;

        $this->types_FILES['name'] =     new \Frick\Request\Types\Filename();
        $this->types_FILES['type'] =     new \Frick\Request\Types\MimeType();
        $this->types_FILES['size'] =     new \Frick\Request\Types\Integer();
        $this->types_FILES['tmp_name'] = new \Frick\Request\Types\FilesystemPath();
        $this->types_FILES['error'] =    new \Frick\Request\Types\Integer();
    }
    public function addData($key, $array)
    {
        if (array_key_exists($key, $this->data)) {
            throw new \Exception("Key allready exists.", 1);
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
    public function setType($key, $type)
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
    public function setDoParseFiles($parse)
    {
        $this->doParseFiles = (bool) $parse;
    }
    public function getDoParseFiles()
    {
        return $this->doParseFiles;
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
        if ($this->doParseFiles) $this->dataWalkRecursive(null, $this->data_FILES, $this->types_FILES);
        return $this;
    }
}
