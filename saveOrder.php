<?php
$stmt = $pdo->prepare('INSERT INTO orders 
    (content, total) VALUES (?, ?)');
$stmt->execute([json_encode($_POST), $_POST['total']]);
