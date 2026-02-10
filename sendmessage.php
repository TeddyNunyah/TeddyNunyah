<?php

require_once 'dbconfig.php';

$message = file_get_contents("php://input");

if(strlen($message) > 500) {
    header("HTTP/1.1 418 I'm a teapot");
    return;
}

$statement = $pdo->prepare("INSERT INTO messages (authorid, message) VALUES (?, ?)");

$statement->execute([1, $message]);
