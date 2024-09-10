<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $newList = $_POST["new-list"];

    $sql = "INSERT INTO lists (user_id, name) VALUES ('$userId', '$newList')";
    $conn->query($sql);

    header('Location: ../index.php');
}

$conn->close();
?>