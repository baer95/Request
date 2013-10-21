<?php

namespace Request\Parser;

class Parser extends AbstractParser implements \Request\Interfaces\ParserInterface
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
