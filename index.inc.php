<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Testing</title>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
        <div class="container">
            <h3>Request</h3>
            <pre><?php

$testing = array(
    "boolean" => true,
    "email" => "bernard.frick@gmx.at",
    "email_dns" => "bernard.frick@gmx.at",
    "filename" => "testing.pdf",
    "filesize" => 3467687,
    "filesystemPath" => "D:/xampp/wwwroot/Request/index.php",
    "float" => 1.25,
    "integer" => 123,
    "ipv4" => "85.124.157.100:21",
    "ipv6" => "[2001::1319:8a2e:0370:85.124.157.100]:8080",
    "json" => '{"Herausgeber":"Xema","Nummer":"1234-5678-9012-3456","Deckung":2e+6,"Währung":"EURO","Inhaber":{"Name":"Mustermann","Vorname":"Max","männlich":true,"Hobbys":["Reiten","Golfen","Lesen"],"Alter":42,"Kinder":[],"Partner":null}}',
    "mimeType" => "application/pdf",
    "name" => "Bernhard Frick",
    "numeric" => "123",
    "password" => "myLittleSecret",
    "string" => "abc ABC ß 1234567890 ,;.:-_ !? ^° \"'`´ §$%& (){}[] ~ +-*:/=",
    "username" => "b.frick",
    "webpath" => "http://localhost/Request/index.php",
    "word" => "wort",
);

$parser = new \Request\Parser\Parser($testing);

use Request\ValueObjects as Value;

$parser->setType("boolean", new Value\Boolean());
$parser->setDefaultValue("boolean", false);

$parser->setType("email", new Value\Email());
$parser->setDefaultValue("email", "");

$parser->setType("float", new Value\Float());
$parser->setDefaultValue("float", 1);

$parser->setType("integer", new Value\Integer());
$parser->setDefaultValue("integer", 1);

$parser->setType("ipv4", new Value\IPv4());
$parser->setDefaultValue("ipv4", "");

$parser->setType("ipv6", new Value\IPv6());
$parser->setDefaultValue("ipv6", "");

$parser->setType("json", new Value\Json());
$parser->setDefaultValue("json", "");

$parser->setType("numeric", new Value\Numeric());
$parser->setDefaultValue("numeric", "");

// $parser->setType("email_dns", new Value\EmailDNS());
// $parser->setType("filename", new Value\Filename());
// $parser->setType("filesize", new Value\Filesize());
// $parser->setType("filesystemPath", new Value\FilesystemPath());
// $parser->setType("mimeType", new Value\MimeType());
// $parser->setType("name", new Value\Name());
// $parser->setType("password", new Value\Password());
// $parser->setType("string", new Value\String());
// $parser->setType("username", new Value\Username());
// $parser->setType("webpath", new Value\Webpath());
// $parser->setType("word", new Value\Word());

try {
    $parser->parseValues();
} catch (Exception $e) {
    echo $e->getMessage();
    echo $e->getLine();
    echo $e->getFile();
}

$matches = $parser->getMatchArray();
print_r($matches);
$values = $parser->getParsedValueArray();
print_r($values);

            ?></pre>
        </div>
    </body>
</html>
