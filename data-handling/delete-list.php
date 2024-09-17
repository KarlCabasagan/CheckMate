<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $listId = $_GET["list-id"];

    $stmt = $conn->prepare("SELECT * FROM products WHERE list_id = ?");
    $stmt->bind_param("s", $listId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = $row['image_url'];
            unlink(".$imagePath");
        }
    }

    $sql = "DELETE FROM lists WHERE id = '$listId'";
    $conn->query($sql);

    header('Location: ../index.php');
}

$conn->close();
?>