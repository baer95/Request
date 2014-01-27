Request
=======
A Class that is dedicated to parsing RQUEST-Data so that it can be used safely later in your webproject.

Components
----------
The Request-Project consists of the following files:

    Request/
    ├── Interfaces/
    │   ├── ParserInterface.php
    │   └── ValueInterface.php
    ├── Parser/
    │   └── Parser.php
    └── ValueObjects/
        ├── AbstractValue.php
        ├── Boolean.php
        ├── Email.php
        ├── Float.php
        ├── IPv4.php
        ├── Json.php
        └── ...

The Request/ValueObjects-Folder holds a file containing a class for each data-dype. This class holds the definition of a data-type and is based on the class AbstractValue, which provides basic functionality to work with the data-to-parse. If you are missing a data-type, feel free to add another one and make a pull-request.


###The Parser-Class

The Parser is class that manages multiple values to be parsed. It provides wrapper-functions that walk through all ValueObject-classes that are based on the AbstractValue-class.

###The ValueInterface

The ValueInterface is needed to provide the ability to walk through all ValueObjects using the Parser-Class.


###The AbstractValue-Class

Most methods to handle a ValueObject are the same for all ValueObjects. They are once defined there.


### The ValueObjects

The ValueObjects all inherit from the AbstractValue-Class and implement the ValueInterface to ensure easy managability through the Parser-Class.

There is only one method that has to be declared in a value-object: the doMatch()-method. It does nothing else but checking whether a given value matches a data-type. This can be done by a regularExpression or any other procedure that ends in a match or mismatch.

To see how it works just take a look at the existing ValueObjects.

Loading the Classes
-------------------

The filenames, foldernames, classnames and namespaces are designed to comply with the standards defined in the PSR-0-Mandatory, which you can find here:

* https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md

The official SplClassLoader-Gist by Jwage, a sample implementation of PSR-0 can be found here:

* https://gist.github.com/jwage/221634

The code snippet below shows the correct usage of the SplClassLoader to load all Request-related files.

```php
<?php

require_once("path/to/your/project/lib/SplClassLoader/SplClassLoader.php");

$classLoader = new \SplClassLoader\SplClassLoader("Request", 'path/to/your/project/lib');
$classLoader->register();

?>
```

Assuming, all Request-related files are saved in "path/to/your/project/lib/Request/", this just works fine for you.

Usage
-----

###GET, POST, COOKIE

To use the Parser just follow the example below:

```php
<?php

$arrayToParse = array(
    "id" => 7,
    "username" => "johnDoe",
    "password" => "myLittleSecret",
    "lastLogin" => 1380747874,
    );

$userData = new \Request\Parser\Parser($arrayToParse);

use Request\ValueObjects as Value;

$userData->setType("id", new Value\Integer());
$userData->setType("username", new Value\Username());
$userData->setType("password", new Value\Password());
$userData->setType("lastLogin", new Value\Integer());

$userData->parseValues();

// To see the results of doMatch(), use:
$results = $userData->getMatchArray();

// To see the parsedValues, use:
$parsedValues = $userData->getParsedValuesArray();

?>
```

To see what data is available, just take a look at the AbstractValue-class, you'll get it.
