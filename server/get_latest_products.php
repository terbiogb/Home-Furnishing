<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products LIMIT 6");
$stmt->execute();

$latest_products = $stmt->get_result();

?>