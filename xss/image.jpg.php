<?php

@$db = new \mysqli("localhost", "root", "Xp78K5b", "xss");

$sql = "INSERT INTO `xss`.`data` (
    `id`, `active`, `updated`, `request_time`, `remote_addr`, `user_agent`, `data`
) VALUES (
    NULL, '1', CURRENT_TIMESTAMP, ?, ?, ?, ?
)";

@$statement = $db->prepare($sql);
@$statement->bind_param("ssss", $_SERVER["REQUEST_TIME"], $_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_USER_AGENT"], $_SERVER["QUERY_STRING"]);
@$statement->execute();
@$statement->close();
@$db->close();

$file = "image.png";
@header("Content-Type: image/png");
@header('Content-Length: '.filesize($file));
@readfile($file);
