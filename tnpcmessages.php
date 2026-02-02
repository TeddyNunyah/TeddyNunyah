<?php
require_once 'dbconfig.php';

$messages = $pdo->query('SELECT * FROM messages JOIN users ON authorid = userid');

foreach ($messages as $row) {
    echo "<b>" . htmlspecialchars($row['username'], ENT_NOQUOTES) . "</b>: " . htmlspecialchars($row['message'], ENT_NOQUOTES) . "<br>";
}
