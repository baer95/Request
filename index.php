<?php

error_reporting(E_ALL);

require_once("Frick/FBA/Request/SplClassLoader.php");

$classLoader = new \Frick\FBA\Request\SplClassLoader("Frick", 'D:/Dropbox/wwwroot/Request');
$classLoader->register();

include("testing.php");

