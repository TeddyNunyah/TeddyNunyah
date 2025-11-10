<!DOCTYPE html>
<html>
<head>
    <title>Teddy Nunyah Private Chat</title>
</head>
<body>
    <?php
    require_once 'dbconfig.php';

    $messages = $pdo->query('SELECT * FROM messages JOIN users ON authorid = userid');

    foreach ($messages as $row) {
        echo "<b>" . htmlspecialchars($row['username']) . "</b>: " . htmlspecialchars($row['message']) . "<br/>";
    }
   ?> 
</body>
</html>
