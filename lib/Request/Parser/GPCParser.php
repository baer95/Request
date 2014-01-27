<?php

// DEPRECATED

namespace Request\Parser;

class GPCParser extends AbstractParser implements \Request\Interfaces\ParserInterface
{
    public function __construct()
    {
        $this->conf = new \Request\Configuration\Configuration();

        $this->data['_GET'] = $_GET;
        $this->data['_POST'] = $_POST;
        $this->data['_COOKIE'] = $_COOKIE;
    }
}
