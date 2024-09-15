<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $listId = $_GET["list-id"];

    $sql = "DELETE FROM lists WHERE id = '$listId'";
    $conn->query($sql);

    header('Location: ../index.php');
}

$conn->close();
?>