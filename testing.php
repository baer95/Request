<?php

error_reporting(E_ALL);

function print_c($i){return("<pre>\n".print_r($i,true)."</pre>\n");}

$_POST["username"] = "1234567890ß´!§$%&/()=?`²³{[]}\"";
$_POST["password"] = "abc";
$_POST["json"] = '{"Herausgeber":"Xema","Nummer":"1234-5678-9012-3456","Deckung":2e+6,"Währung":"EURO","Inhaber":{"Name":"Mustermann","Vorname":"Max","männlich":true,"Hobbys":["Reiten","Golfen","Lesen"],"Alter":42,"Kinder":[],"Partner":null}}';

// json_decode: JSON-String -> PHP-Variable
// json_encode: PHP-Variable -> JSON-String

require_once("Frick/FBA/Request/SplClassLoader.php");

$classLoader = new \Frick\FBA\Request\SplClassLoader("Frick", 'D:/Dropbox/wwwroot/Request');
$classLoader->register();

$a = new \Frick\FBA\Request\Parser();

$array = array(
    "username" => "b.frick",
    "password" => "91fri173",
    "address"  => "85.124.157.100:443");

$a->addUserDefinedArray("login", $array);

$a->setUserVarType("login", "username", REQUEST_USERNAME);
$a->setUserVarType("login", "password", REQUEST_PASSWORD);
$a->setUserVarType("login", "address", REQUEST_IPv4);

$a->setPostVarType("username", REQUEST_USERNAME);
$a->setPostVarType("password", REQUEST_PASSWORD);
$a->setPostVarType("json", REQUEST_JSON);

$a->parse_USER();

$a->parse_ALL();
