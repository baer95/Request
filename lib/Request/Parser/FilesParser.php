<?php

namespace Request\Parser;

class FilesParser extends AbstractParser implements \Request\Interfaces\ParserInterface
{
    protected $data = array();
    protected $types = array();

    public function __construct()
    {
        $this->data = $_FILES;

        $this->types['name'] =     new \Request\Types\Filename();
        $this->types['type'] =     new \Request\Types\MimeType();
        $this->types['size'] =     new \Request\Types\Integer();
        $this->types['tmp_name'] = new \Request\Types\FilesystemPath();
        $this->types['error'] =    new \Request\Types\Integer();
    }
}
