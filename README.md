Request
=======
A Class that parses REQUEST-Data so that it can be used safely later in the code.

Components
----------
The Request-Project consists of two files:

* Parser.php
* Adjust.php

###Parser

The Parser-Class is used to set the Types for Input-Values and to walk through the REQUEST-Arrays and parse the Values for the given Types.

Currently available are the following Input-Types:

* Username - `REQUEST_USERNAME`
* Password - `REQUEST_PASSWORD`
* E-Mail - `REQUEST_EMAIL`
* String - `REQUEST_STRING`
* Boolean - `REQUEST_BOOL`
* Integer - `REQUEST_INT`
* Numeric - `REQUEST_NUMERIC`
* Float - `REQUEST_FLOAT`
* IPv4 - `REQUEST_IPv4`
* IPv6 - `REQUEST_IPv6`
* JSON-Array - `REQUEST_JSON`
* Filename - `REQUEST_FILENAME`
* Mime-Type - `REQUEST_MIME`
* Filesize -`REQUEST_FILESIZE`
* Webpath - `REQUEST_WEBPATH`
* Filesystem-Path - `REQUEST_FSPATH`
* PHP-Array - `REQUEST_ARRAY`
* Binary-Files - `REQUEST_BINARY`

###Adjust

This is a static Class that provides the Type-Checks.
Those Methods are used to parse the given Value for the given Type.
The Parser-Class uses those Methods.

The Methods of the Parser-Class take the Value as first Parameter, and an optional second Parameter `$adjust = true`, which tells the Method whether the Value should be corrected to fit the type if the check failed.

Loading the Class
-----------------

There are two Possibilities to load the Request-Classes:
* Using the SplClassLoader
* loading the two files using the `require_once()`-Functions provided by PHP.

###The SplClassLoader
The SplClassLoader is an example-Implemention of a class-Loader following the PSR-0-Mandatory, which is described here:

* https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md

The official SplClassLoader-Gist by Jwage can be found here:

* https://gist.github.com/jwage/221634



```php
require_once("lib/Frick/FBA/Request/SplClassLoader.php");

$classLoader = new \Frick\FBA\Request\SplClassLoader("Frick", 'path/to/your/project/lib');
$classLoader->register();`

```


###Loading the Classes manually



To use th

Usage
-----

