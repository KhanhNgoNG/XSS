<?php
$db = new SQLite3('comments.db');

$query = "CREATE TABLE IF NOT EXISTS comments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    comment TEXT NOT NULL,
    product TEXT NOT NULL,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP
)";

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)");

if ($db->exec($query)) {
    echo "Database and tables initialized successfully.";
} else {
    echo "Error initializing database: " . $db->lastErrorMsg();
}

$db->close();
?>