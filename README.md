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

* Array - `REQUEST_ARRAY`
* Binary - `REQUEST_BINARY`
* Boolean - `REQUEST_BOOL`
* Email - `REQUEST_EMAIL`
* Email with Domain-Check - `REQUEST_EMAIL_DNS`
* Filename - `REQUEST_FILENAME`
* Filesize - `REQUEST_FILESIZE`
* Float - `REQUEST_FLOAT`
* Filesystem-Path - `REQUEST_FSPATH`
* HTML - `REQUEST_HTML`
* Integer - `REQUEST_INT`
* IPv4 - `REQUEST_IPv4`
* IPv6 - `REQUEST_IPv6`
* JSON-Array - `REQUEST_JSON`
* MIME-Type - `REQUEST_MIME`
* Name - `REQUEST_NAME`
* Numeric - `REQUEST_NUMERIC`
* Password - `REQUEST_PASSWORD`
* String - `REQUEST_STRING`
* Username - `REQUEST_USERNAME`
* Webpath - `REQUEST_WEBPATH`

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

The code snippet below shows the correct usage of the SplClassLoader to load the Classes needed to secure your REQUEST-Data.

```php
<?php

require_once("path/to/your/project/lib/Frick/Request/SplClassLoader.php");

$classLoader = new \Frick\Request\SplClassLoader("Frick", 'path/to/your/project/lib');
$classLoader->register();

?>
```

###Loading the Classes manually

To use the built-in functions in PHP, do the following:

```php
<?php

require_once("path/to/your/project/lib/Frick/Request/Parser.php");
require_once("path/to/your/project/lib/Frick/Request/Adjust.php");

?>
```

Usage
-----

###GET, POST, COOKIE

To use the Parser just follow the example below:

```php
<?php

  // Simulate some input-data...
$_GET['id'] = 34;
$_POST['firstname'] = 'John';
$_POST['lastname'] = 'Doe';
$_COOKIE['lastlogin'] = 1380747874;

$parser = new \Frick\Request\Parser();

$parser->setGetVarType('id', REQUEST_INT);
$parser->setPostVarType('firstname', REQUEST_NAME);
$parser->setPostVarType('lastname', REQUEST_NAME);
$parser->setCookieVarType('lastlogin', REQUEST_INT);

$parser->parse_GET();
$parser->parse_POST();
$parser->parse_COOKIE();

?>
```

The parsed and corrected values are now accessible at their original place.

###FILES

The parsing of the `$_FILES`-Array is preconfigured, as there are always the five same Value-Types for every file-array.

```php
<?php

$parser->parse_FILES();

?>
```

You can turn off the parsing of the `$_FILES`-Array by using the following:

```php
<?php

$parser->setParseFilesArray(false);

?>
```

###User-defined arrays

Sometimes it may come to the case, that you might want to parse values that are not stored in one of the REQUEST-Arrays.
Threfore, you can use the parsing of User-Defined Arrays.

You only need to specify a key, under which your array will be stored for parsing.
You can also specify multiple arrays to be parsed.
The key you specify is also used to retrieve your parsed array.

```php
<?php

$arrayToBeParsed = array(
  'someString' => 'Hello, my name is John Doe.',
  'someInteger' => 93845,
  'somePassword' => 'myLittleSecret'
);

$parser->setUserDefinedArray('someData', $arrayToBeParsed);

$parser->parse_USER();

$parsedArray = $parser->getUserDefinedArray('someData');

?>
```

###parsing all REQUEST-Arrays at once

Instead of writing:
```php
<?php

$parser->parse_USER();
$parser->parse_GET();
$parser->parse_POST();
$parser->parse_COOKIE();
$parser->parse_FILES();

?>
```

You can also just write:

```php
<?php

$parser->parse_ALL();

?>
```

Which is the same.


###Support for method-chaining

Every Setter- and Parser-Method is configured to return the current instance,
so that method-chaining can be used and setting multiple Value-Types becomes more clearly.

```php
<?php

$parser->setGetVarType('id', REQUEST_NUMERIC)
       ->setGetVarType('type', REQUEST_STIRNG)
       ->parse_GET();

?>
```
