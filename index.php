<?php

error_reporting(E_ALL);

mb_internal_encoding("UTF-8");
mb_regex_encoding(mb_internal_encoding());

require_once("Frick/Request/SplClassLoader.php");

$classLoader = new \Frick\Request\SplClassLoader("Frick", 'D:/Dropbox/wwwroot/Request');
$classLoader->register();

include("testing.php");



