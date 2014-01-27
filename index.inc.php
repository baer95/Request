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
    "boolean" => "false",
    "email" => "bernard.frick@gmx.at",
    "email_dns" => "bernard.frick@gmx.at",
    "filename" => "testing.pdf",
    "filesize" => 3467687,
    "filesystemPath" => "D:/xampp/wwwroot/Request/index.php",
    "float" => 1.25,
    "integer" => 123,
    "ipv4" => "85.124.157.100:80",
    // "ipv6" => "2001:0db8:85a3:08d3:1319:8a2e:0370:7344",
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


$parser = new \Request\Parser\GPCParser();
$parser->addData("testing", $testing);

use Request\Types as Types;

$parser->setType("boolean", new Types\Boolean());
$parser->setType("email", new Types\Email());
$parser->setType("email_dns", new Types\EmailDNS());
$parser->setType("filename", new Types\Filename());
$parser->setType("filesize", new Types\Filesize());
$parser->setType("filesystemPath", new Types\FilesystemPath());
$parser->setType("float", new Types\Float());
$parser->setType("integer", new Types\Integer());
$parser->setType("ipv4", new Types\IPv4());
$parser->setType("ipv6", new Types\IPv6());
$parser->setType("json", new Types\Json());
$parser->setType("mimeType", new Types\MimeType());
$parser->setType("name", new Types\Name());
$parser->setType("numeric", new Types\Numeric());
$parser->setType("password", new Types\Password());
$parser->setType("string", new Types\String());
$parser->setType("username", new Types\Username());
$parser->setType("webpath", new Types\Webpath());
$parser->setType("word", new Types\Word());
$parser->setType("penis", new Types\Word());

try {
    $parser->parse();
} catch (Exception $e) {
    echo $e->getMessage();
    echo $e->getLine();
    echo $e->getFile();
}

$parsedTesting = $parser->getData("testing");
print_r($parsedTesting);

$parsed_GET = $parser->getData("_GET");
print_r($parsed_GET);





















// Testing the FilesParser
    // $filesParser = new \Request\Parser\FilesParser();
    // print_r($filesParser->parse()->getData());



// foreach ($testing as $key => $value) {
//     echo $key.":\n";
//     echo "\t".gettype($value)." ".print_r($value, true)."\n";
//     echo "\t".gettype($parsed_testing[$key])." ".print_r($parsed_testing[$key], true)."\n\n";
// }





            ?></pre>
        </div>
    </body>
</html>
