<?php

error_reporting(E_ALL);

mb_internal_encoding("UTF-8");
mb_regex_encoding(mb_internal_encoding());

require_once("lib/SplClassLoader/SplClassLoader.php");

$classLoader = new \SplClassLoader("Request", 'D:/Dropbox/wwwroot/Request/lib');
$classLoader->register();

include("index.inc.php");
