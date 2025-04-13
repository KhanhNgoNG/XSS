<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h1 class="mb-4">Welcome to Our Store</h1>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! <a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="register.php">Register</a> to leave feedback.</p>
    <?php endif; ?>

    <h2>Products</h2>
    <ul>
        <li><a href="product_page.php?product=ProductA">Product A</a></li>
        <li><a href="product_page.php?product=ProductB">Product B</a></li>
        <li><a href="product_page.php?product=ProductC">Product C</a></li>
    </ul>
</body>
</html>