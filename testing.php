<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Testing</title>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
        <div class="container">
            <pre><?php

$testing = array(
    "array" => array("key" => "value"),
    "binary" => "0bf8er4u84984444443tjß98fjtcg2349ß8htn3öt9omqtj",
    "boolean" => true,
    "email" => "bernard.frick@gmx.at",
    "email_dns" => "bernard.frick@gmx.at",
    "filename" => "testing.pdf",
    "filesize" => 3467687,
    "filesystemPath" => "D:/xampp/wwwroot/Request/index.php",
    "float" => 1.25,
    "html5" => "<!DOCTYPE html5><html></html>",
    "integer" => 123,
    "ipv4" => "85.124.157.100:80",
    "ipv6" => "",
    "json" => '{"Herausgeber":"Xema","Nummer":"1234-5678-9012-3456","Deckung":2e+6,"Währung":"EURO","Inhaber":{"Name":"Mustermann","Vorname":"Max","männlich":true,"Hobbys":["Reiten","Golfen","Lesen"],"Alter":42,"Kinder":[],"Partner":null}}',
    "mimeType" => "application/pdf",
    "name" => "Bernhard Frick",
    "numeric" => "123",
    "password" => "myLittleSecret",
    "string" => "abc ABC ß 1234567890 ,;.:-_ !? ^° \"'`´ §$%& (){}[] ~ +-*:/=",
    "username" => "b.frick",
    "webpath" => "http://localhost/Request/index.php",
);

$_GET = $testing;
$_POST = $testing;
$_COOKIE = $testing;

$parser = new \Frick\Request\Parser();

$a->addData("testing", $testing);

$a->setType("array", new \Frick\Request\Types\Array());
$a->setType("binary", new \Frick\Request\Types\Binary());
$a->setType("boolean", new \Frick\Request\Types\Boolean());
$a->setType("email", new \Frick\Request\Types\Email());
$a->setType("email_dns", new \Frick\Request\Types\Email_DNS());
$a->setType("filename", new \Frick\Request\Types\Filename());
$a->setType("filesize", new \Frick\Request\Types\Filesize());
$a->setType("filesystemPath", new \Frick\Request\Types\filesystemPath());
$a->setType("float", new \Frick\Request\Types\Float());
$a->setType("html5", new \Frick\Request\Types\HTML5());
$a->setType("integer", new \Frick\Request\Types\Integer());
$a->setType("ipv4", new \Frick\Request\Types\IPv4());
$a->setType("ipv6", new \Frick\Request\Types\IPv6());
$a->setType("json", new \Frick\Request\Types\Json());
$a->setType("mimeType", new \Frick\Request\Types\MimeType());
$a->setType("name", new \Frick\Request\Types\Name());
$a->setType("numeric", new \Frick\Request\Types\Numeric());
$a->setType("password", new \Frick\Request\Types\Password());
$a->setType("string", new \Frick\Request\Types\String());
$a->setType("username", new \Frick\Request\Types\Username());
$a->setType("webpath", new \Frick\Request\Types\Webpath());

$a->parse();

$parsed_GET = $a->getData("_GET");
$parsed_POST = $a->getData("_POST");
$parsed_COOKIE = $a->getData("_COOKIE");
$parsed_testing = $a->getData("testing");

foreach ($testing as $key => $value) echo $key.":\n\t".gettype($value)." ".print_r($value, true)."\n\n";

            ?></pre>
        </div>
    </body>
</html>
