<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productId = $_GET["product-id"];

    $stmt = $conn->prepare("SELECT image_url FROM products WHERE id = ?");
    $stmt->bind_param("s", $productId);
    $stmt->execute();
    $stmt->bind_result($imagePath);
    $stmt->fetch();

    unlink(".$imagePath");

    $sql = "DELETE FROM products WHERE id = '$productId'";
    $conn->query($sql);

    exit();
}

$conn->close();
?>