<?php
include "db_conn.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $listId = $_POST["list-id"];
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];
    $productQuantity = $_POST["quantity"];
    $productWeight = $_POST["product-weight"];
    $productCategory = $_POST["category-select"];
    $productBrand = $_POST["brand-name"];
    $productStore = $_POST["store-name"];

    if ($productQuantity < 1) {
        $productQuantity = 1;
    }
    if (!$productWeight) {
        $productWeight = "0 grams";
    }

    // echo $listId . $productName . $productPrice . $productQuantity . $productWeight . $productCategory . $productBrand . $productStore;

    function generateUniqueFilename($originalFilename) {
        $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
        $randomString = bin2hex(random_bytes(16));
        $uniqueFilename = $randomString . '.' . $extension;
        return $uniqueFilename;
    }

    if (isset($_FILES["product-image"]) && $_FILES["product-image"]["error"] == 0) {
        $targetDir = "../images/products/";
        $originalFilename = basename($_FILES["product-image"]["name"]);
        $uniqueFilename = generateUniqueFilename($originalFilename);
        $targetFile = $targetDir . $uniqueFilename;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
            if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFile)) {
                $imagePath = "./images/products/" . $uniqueFilename;
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Invalid image file type.";
        }
    } else {
        $imagePath = null;
    }

    $sql = "INSERT INTO products (list_id, name, brand, price, quantity, weight, store, category, image_url) VALUES ('$listId', '$productName', '$productBrand', '$productPrice', '$productQuantity', '$productWeight', '$productStore', '$productCategory', '$imagePath')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>