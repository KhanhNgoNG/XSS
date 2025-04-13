<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$db = new SQLite3('comments.db');
$username = $_SESSION['username'];
$comment = $_POST['comment'] ?? '';
$product = $_POST['product'] ?? 'ProductA';

$stmt = $db->prepare("INSERT INTO comments (username, comment, product) VALUES (:username, :comment, :product)");
$stmt->bindValue(':username', $username, SQLITE3_TEXT);
$stmt->bindValue(':comment', $comment, SQLITE3_TEXT);
$stmt->bindValue(':product', $product, SQLITE3_TEXT);
$stmt->execute();

header("Location: product_page.php?product=" . urlencode($product));
exit;
?>