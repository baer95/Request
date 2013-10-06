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

$array = array(
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

foreach ($array as $key => $value) {
    $_GET[$key] = $value;
    $_POST[$key] = $value;
    $_COOKIE[$key] = $value;
}

$a = new \Frick\Request\Parser();

$a->addUserDefinedArray("testing", $array);

$a  ->setUserVarType("testing", "username", REQUEST_USERNAME)
    ->setUserVarType("testing", "password", REQUEST_PASSWORD)
    ->setUserVarType("testing", "email", REQUEST_EMAIL)
    ->setUserVarType("testing", "email_dns", REQUEST_EMAIL_DNS)
    ->setUserVarType("testing", "name", REQUEST_NAME)
    ->setUserVarType("testing", "string", REQUEST_STRING)
    ->setUserVarType("testing", "bool", REQUEST_BOOL)
    ->setUserVarType("testing", "int", REQUEST_INT)
    ->setUserVarType("testing", "numeric", REQUEST_NUMERIC)
    ->setUserVarType("testing", "float", REQUEST_FLOAT)
    ->setUserVarType("testing", "ipv4", REQUEST_IPv4)
    ->setUserVarType("testing", "ipv6", REQUEST_IPv6)
    ->setUserVarType("testing", "json", REQUEST_JSON)
    ->setUserVarType("testing", "filename", REQUEST_FILENAME)
    ->setUserVarType("testing", "mime", REQUEST_MIME)
    ->setUserVarType("testing", "filesize", REQUEST_FILESIZE)
    ->setUserVarType("testing", "webpath", REQUEST_WEBPATH)
    ->setUserVarType("testing", "fspath", REQUEST_FSPATH)
    ->setUserVarType("testing", "array", REQUEST_ARRAY)
    ->setUserVarType("testing", "binary", REQUEST_BINARY);

$a  ->setGetVarType("username", REQUEST_USERNAME)
    ->setGetVarType("password", REQUEST_PASSWORD)
    ->setGetVarType("email", REQUEST_EMAIL)
    ->setGetVarType("email_dns", REQUEST_EMAIL_DNS)
    ->setGetVarType("name", REQUEST_NAME)
    ->setGetVarType("string", REQUEST_STRING)
    ->setGetVarType("bool", REQUEST_BOOL)
    ->setGetVarType("int", REQUEST_INT)
    ->setGetVarType("numeric", REQUEST_NUMERIC)
    ->setGetVarType("float", REQUEST_FLOAT)
    ->setGetVarType("ipv4", REQUEST_IPv4)
    ->setGetVarType("ipv6", REQUEST_IPv6)
    ->setGetVarType("json", REQUEST_JSON)
    ->setGetVarType("filename", REQUEST_FILENAME)
    ->setGetVarType("mime", REQUEST_MIME)
    ->setGetVarType("filesize", REQUEST_FILESIZE)
    ->setGetVarType("webpath", REQUEST_WEBPATH)
    ->setGetVarType("fspath", REQUEST_FSPATH)
    ->setGetVarType("array", REQUEST_ARRAY)
    ->setGetVarType("binary", REQUEST_BINARY);

$a  ->setPostVarType("username", REQUEST_USERNAME)
    ->setPostVarType("password", REQUEST_PASSWORD)
    ->setPostVarType("email", REQUEST_EMAIL)
    ->setPostVarType("email_dns", REQUEST_EMAIL_DNS)
    ->setPostVarType("name", REQUEST_NAME)
    ->setPostVarType("string", REQUEST_STRING)
    ->setPostVarType("bool", REQUEST_BOOL)
    ->setPostVarType("int", REQUEST_INT)
    ->setPostVarType("numeric", REQUEST_NUMERIC)
    ->setPostVarType("float", REQUEST_FLOAT)
    ->setPostVarType("ipv4", REQUEST_IPv4)
    ->setPostVarType("ipv6", REQUEST_IPv6)
    ->setPostVarType("json", REQUEST_JSON)
    ->setPostVarType("filename", REQUEST_FILENAME)
    ->setPostVarType("mime", REQUEST_MIME)
    ->setPostVarType("filesize", REQUEST_FILESIZE)
    ->setPostVarType("webpath", REQUEST_WEBPATH)
    ->setPostVarType("fspath", REQUEST_FSPATH)
    ->setPostVarType("array", REQUEST_ARRAY)
    ->setPostVarType("binary", REQUEST_BINARY);

$a  ->setCookieVarType("username", REQUEST_USERNAME)
    ->setCookieVarType("password", REQUEST_PASSWORD)
    ->setCookieVarType("email", REQUEST_EMAIL)
    ->setCookieVarType("email_dns", REQUEST_EMAIL_DNS)
    ->setCookieVarType("name", REQUEST_NAME)
    ->setCookieVarType("string", REQUEST_STRING)
    ->setCookieVarType("bool", REQUEST_BOOL)
    ->setCookieVarType("int", REQUEST_INT)
    ->setCookieVarType("numeric", REQUEST_NUMERIC)
    ->setCookieVarType("float", REQUEST_FLOAT)
    ->setCookieVarType("ipv4", REQUEST_IPv4)
    ->setCookieVarType("ipv6", REQUEST_IPv6)
    ->setCookieVarType("json", REQUEST_JSON)
    ->setCookieVarType("filename", REQUEST_FILENAME)
    ->setCookieVarType("mime", REQUEST_MIME)
    ->setCookieVarType("filesize", REQUEST_FILESIZE)
    ->setCookieVarType("webpath", REQUEST_WEBPATH)
    ->setCookieVarType("fspath", REQUEST_FSPATH)
    ->setCookieVarType("array", REQUEST_ARRAY)
    ->setCookieVarType("binary", REQUEST_BINARY);

$a  ->parse_USER()
    ->parse_GET()
    ->parse_POST()
    ->parse_COOKIE()
    ->parse_FILES();

$parsedArray = $a->getUserDefinedArray("testing");

// foreach ($array as $key => $value) {
//     echo $key.":\n";
//     echo "\tInput:  ".gettype($value)." ".$value."\n";
//     echo "\tUDA:    ".gettype($parsedArray[$key])." ".$parsedArray[$key]."\n";
//     echo "\tPOST:   ".gettype($_POST[$key])." ".$_POST[$key]."\n";
//     echo "\tGET:    ".gettype($_GET[$key])." ".$_GET[$key]."\n";
//     echo "\tCOOKIE: ".gettype($_COOKIE[$key])." ".$_COOKIE[$key]."\n\n";
// }

// echo gettype($parsedArray["email"])."\n";

// print_r($parsedArray["email"]);





// print_r(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES|ENT_HTML5));
// Specialchars
//     &, ", <, >
// Entities
//     Alle Zeichen, die nicht im latin-1 (?) vorkommen (kyriles zeugs und so weiter)

// htmlentities($string, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);







            ?></pre>
        </div>
    </body>
</html>
