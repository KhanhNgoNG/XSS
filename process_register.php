<?php
$db = new SQLite3('comments.db');
$username = $_POST['username'] ?? '';
$password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$stmt->execute();

header("Location: login.php");
exit;
?>