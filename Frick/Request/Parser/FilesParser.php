<?php

namespace Frick\Request\Parser;

class FilesParser extends AbstractParser implements \Frick\Request\Interfaces\ParserInterface
{
    protected $data = array();
    protected $types = array();

    public function __construct()
    {
        $this->data = $_FILES;

        $this->types['name'] =     new \Frick\Request\Types\Filename();
        $this->types['type'] =     new \Frick\Request\Types\MimeType();
        $this->types['size'] =     new \Frick\Request\Types\Integer();
        $this->types['tmp_name'] = new \Frick\Request\Types\FilesystemPath();
        $this->types['error'] =    new \Frick\Request\Types\Integer();
    }
}
