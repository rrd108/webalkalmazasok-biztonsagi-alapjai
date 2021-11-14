<?php

// Nem biztonságos mód
$query = 'SELECT * FROM users  WHERE email = "' . $_POST['email'] . '" AND pass = "' . $_POST['password'] . '"';
// SELECT * FROM users  WHERE email = "senki@sehol.se" AND pass = "123456789"
// SELECT * FROM users  WHERE email = "" OR 1=1 -- rrd AND pass = "123456789"
$stmt = $pdo->query($query);

/* Biztonságos mód
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND pass = ?');
$stmt->execute([$_POST['email'], $_POST['password']]);
*/

$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $_SESSION['user'] = $user;
} else {
    die('Login Error');
}
