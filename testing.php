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
    "username" => "abc ABC ß 1234567890 ,;.:-_ !? ^° \"'`´ §$%& (){}[] ~ +-*:/=",
    // "password" => "myLittleSecret",
    "email" => "bernard. frick@gmx.at",
    "email_dns" => "b.frick@gmail.com",
    "name" => "aAäÄöÖüÜß-",
    "string" => "1234567890ß´!§$%&/()=?`²³{[]}\"",
    "bool" => 1,
    "int" => 123.2,
    "numeric" => "123",
    "float" => 1.25,
    "ipv4" => "85.124.157.100:80",
    "ipv6" => "",
    // "json" => '{"Herausgeber":"Xema","Nummer":"1234-5678-9012-3456","Deckung":2e+6,"Währung":"EURO","Inhaber":{"Name":"Mustermann","Vorname":"Max","männlich":true,"Hobbys":["Reiten","Golfen","Lesen"],"Alter":42,"Kinder":[],"Partner":null}}',
    "filename" => "testing.pdf",
    "mime" => "application/pdf",
    "filesize" => 3467687,
    "webpath" => "",
    "fspath" => "D:/Dropbox/wwwroot/Request/testing.php",
    // "array" => array("key" => "value"),
    "binary" => "0bf8er4u84984444443tjß98fjtcg2349ß8htn3öt9omqtj"
);

foreach ($testing as $key => $value) {
    $_GET[$key] = $value;
    $_POST[$key] = $value;
    $_COOKIE[$key] = $value;
}

$a = new \Frick\Request\Parser();

$a->addData("testing", $testing);










foreach ($testing as $key => $value) {
    echo $key.":\n";
    echo "\tInput:  ".gettype($value)." ".$value."\n";
    // echo "\tUDA:    ".gettype($parsedArray[$key])." ".$parsedArray[$key]."\n";
    echo "\tPOST:   ".gettype($_POST[$key])." ".$_POST[$key]."\n";
    echo "\tGET:    ".gettype($_GET[$key])." ".$_GET[$key]."\n";
    echo "\tCOOKIE: ".gettype($_COOKIE[$key])." ".$_COOKIE[$key]."\n\n";
}

            ?></pre>
        </div>
    </body>
</html>
