<?php
session_start();
$db = new SQLite3('comments.db');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $db->query($query);

if ($row = $result->fetchArray()) {
    $_SESSION['username'] = $row['username'];
    header("Location:home.php");
} else {
    echo "Invalid credentials.";
}
?>
