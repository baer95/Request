<?php

error_reporting(E_ALL);

mb_internal_encoding("UTF-8");
mb_regex_encoding(mb_internal_encoding());

require_once("lib/Request/SplClassLoader.php");

$classLoader = new \Request\SplClassLoader("Request", 'D:/Dropbox/wwwroot/Request/lib');
$classLoader->register();

include("testing.php");



