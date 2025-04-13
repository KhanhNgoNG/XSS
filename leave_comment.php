<?php
session_start();
$product = $_GET['product'] ?? 'ProductA';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave a Comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h1>Leave a Comment for <?php echo htmlspecialchars($product); ?></h1>
    <form method="POST" action="submit_comment.php">
        <input type="hidden" name="product" value="<?php echo htmlspecialchars($product); ?>">
        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea class="form-control" name="comment" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</body>
</html>