<?php
include "data-handling/db_conn.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/add-product.css">
    <link rel="icon" href="images/logo-icon.png">
    <title>CheckMate</title>
</head>
<body>
    <div class="container">
        <div class="header-wrapper">
            <div class="header-left-wrapper">
                <div class="close-button-wrapper">
                    <button id="close-button" onclick="window.location.href = './index.php';">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m252-176-74-76 227-228-227-230 74-76 229 230 227-230 74 76-227 230 227 228-74 76-227-230-229 230Z"/></svg>
                    </button>
                </div>
                <div class="create-new-product-wrapper">
                    <span>Add new product</span>
                </div>
            </div>
            <div class="done-button-wrapper">
                <button id="done-button">
                    Done
                </button>
            </div>
        </div>
        <div class="new-product-form-wrapper">
            <form id="add-product-form" action="./data-handling/add-product.php" method="POST" enctype="multipart/form-data">
                <div class="input-wrapper">
                    <input type="hidden" name="list-id" id="list-id">
                    <input type="text" name="product-name" id="product-name" placeholder="Enter product name">
                    <input type="text" name="product-brand" id="product-brand" placeholder="Brand">
                    <div class="price-quantity-wrapper">
                        <input type="number" name="product-price" id="product-price" placeholder="Price">
                        <input type="number" name="product-quantity" id="product-quantity" placeholder="Quantity">
                    </div>
                    <input type="text" name="product-weight" id="product-weight" placeholder="Weight">
                    <input type="text" name="product-store" id="product-store" placeholder="Store">
                    <input type="text" name="product-category" id="product-category" placeholder="Category">
                    <input type="file" name="product-image" id="product-image" accept="image/*" onchange="previewImage(event)">
                </div>
            </form>
        </div>
    </div>
    <script>
        const doneButton = document.getElementById('done-button');
        const form = document.getElementById('add-product-form');
        doneButton.addEventListener('click', (event) => {
            form.submit();
        });

        const urlParams = new URLSearchParams(window.location.search);
        const listId = urlParams.get('list-id');
        const hiddenInput = document.getElementById('list-id');

        hiddenInput.value = listId;
        // function checkSession() {
        //     const xhr = new XMLHttpRequest();
        //     xhr.open("GET", "test.php");
        //     xhr.onload = function() {
        //         if (xhr.status === 200) {
        //             const response = xhr.responseText;
        //             if (response === "You are logged in.") {
        //                 // User is logged in, do something
        //             } else {
        //                 window.location.href = "login.php";
        //             }
        //         } else {
        //             console.error("Error checking session:", xhr.status);
        //         }
        //     };
        //     xhr.send();
        // }

        // checkSession();
    </script>
</body>
</html>