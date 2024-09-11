<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productId = $_GET["product-id"];

    $sql = "UPDATE products SET is_purchased = 1 WHERE id = '$productId'";
    $conn->query($sql);

    exit();
}

$conn->close();
?>