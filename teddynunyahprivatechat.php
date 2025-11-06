<!DOCTYPE html>
<html>
<head>
    <title>Teddy Nunyah Private Chat</title>
</head>
<body>
    <?php
    require_once 'dbconfig.php';

    $messages = $pdo->query('SELECT * FROM messages');
    foreach ($messages as $row) {
        echo "<b>" . $row['userid'] . "</b>: " . $row['message'] . "<br/>";
    }
   ?> 
</body>
</html>
