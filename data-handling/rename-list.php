<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listId = $_POST["list-id"];
    $listName = $_POST["list-name"];

    // echo $listId . $listName;

    $sql = "UPDATE lists SET name = '$listName' WHERE id = '$listId'";
    $conn->query($sql);

    header('Location: ../index.php');
}

$conn->close();
?>