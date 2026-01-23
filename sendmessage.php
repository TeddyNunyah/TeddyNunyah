<?php

require_once 'dbconfig.php';

$message = file_get_contents("php://input");
$statement = $pdo->prepare("INSERT INTO messages (authorid, message) VALUES (?, ?)");

$statement->execute([1, $message]);
