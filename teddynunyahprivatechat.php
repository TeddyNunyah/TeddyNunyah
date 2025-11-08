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
        $username = $pdo->query('SELECT username FROM users WHERE id = ' . $row['userid']);
        echo "<b>" . $username->fetch(PDO::FETCH_ASSOC)['username'] . "</b>: " . $row['message'] . "<br/>";
    }
   ?> 
</body>
</html>
