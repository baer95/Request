<?php

namespace Frick\Request\Parser;

class GeneralParser extends AbstractParser implements \Frick\Request\Interfaces\ParserInterface
{
    protected $data = array();
    protected $types = array();

    public function __construct()
    {
        $this->data['_GET'] = $_GET;
        $this->data['_POST'] = $_POST;
        $this->data['_COOKIE'] = $_COOKIE;
    }
}
