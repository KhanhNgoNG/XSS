<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$db = new SQLite3('comments.db');
$product = $_GET['product'] ?? 'ProductA';
$results = $db->prepare("SELECT * FROM comments WHERE product = :product ORDER BY id DESC");
$results->bindValue(':product', $product, SQLITE3_TEXT);
$comments = $results->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Page - <?php echo htmlspecialchars($product); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h1><?php echo htmlspecialchars($product); ?></h1>
    <a href="leave_comment.php?product=<?php echo urlencode($product); ?>" class="btn btn-primary mb-3">Leave a Comment</a>
    <a href="home.php" class="btn btn-secondary mb-3">Back to Home</a>

    <h2>Comments</h2>
    <?php while ($row = $comments->fetchArray(SQLITE3_ASSOC)) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['username']); ?></h5>
                <p class="card-text"><?php echo $row['comment'];?></p>
                <small class="text-muted">Posted on <?php echo $row['created_at']; ?></small>
            </div>
        </div>
    <?php endwhile; ?>
</body>
</html>
