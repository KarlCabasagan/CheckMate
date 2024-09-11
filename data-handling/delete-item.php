<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productId = $_GET["product-id"];

    $sql = "DELETE FROM products WHERE id = '$productId'";
    $conn->query($sql);

    exit();
}

$conn->close();
?>