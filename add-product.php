<?php
include "data-handling/db_conn.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $listId = $_GET["list-id"];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/edit-product.css">
    <link rel="icon" href="images/logo-icon.png">
    <title>Document</title>
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
                    <span>Add Product</span>
                </div>
            </div>
            <div class="header-right-wrapper">
                <button id="done-button">
                    <span>Done</span>
                </button>
            </div>
        </div>

        <div class="form-wrapper">
            <form action="./data-handling/add-product.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="list-id" id="list-id" value="<?php echo $listId ?>">
                <div class="image-input-wrapper">
                    <div class="image-wrapper">
                        <img id="previewImage" src="">
                        <svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960" width="60px" fill="#444444"><path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600v-600H180v600Zm56-97h489L578-473 446-302l-93-127-117 152Zm-56 97v-600 600Z"/></svg>
                    </div>
                    <div class="image-input">
                        <input type="file" name="product-image" id="product-image" accept="image/*">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1a414f"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                        </span>
                    </div>
                </div>
                <div class="name-input-wrapper">
                    <div class="name-input-box">
                        <input type="text" name="product-name" id="product-name" placeholder="Product name (Required)">
                    </div>
                    <div class="error-message-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ff3030"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                        <span id="error-message">Please enter a name</span>
                    </div>
                </div>
                <div class="price-quantity-wrapper">
                    <div class="price-input-box">
                        <span>₱</span>
                        <input type="number" name="product-price" id="product-price" placeholder="Price">
                    </div>
                    <div class="quantity-input-box">
                        <input type="number" name="quantity" id="quantity" placeholder="Quantity">
                    </div>
                </div>
                <div class="weight-category-wrapper">
                    <div class="weight-input-box">
                        <input type="text" name="product-weight" id="product-weight" placeholder="Weight">
                    </div>
                    <div class="category-select-box">
                        <!-- <input type="number" name="quantity" id="quantity" placeholder="Quantity"> -->
                         <select name="category-select" id="category-select">
                            <option value="Fruits">Fruits</option>
                            <option value="Vegetables">Vegetables</option>
                            <option value="Canned Goods">Canned Goods</option>
                            <option value="Dairy">Dairy</option>
                            <option value="Meat">Meat</option>
                            <option value="Fish & Seafood">Fish & Seafood</option>
                            <option value="Condiments & Spices">Condiments & Spices</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Bread & Bakery">Bread & Bakery</option>
                            <option value="Beverages">Beverages</option>
                         </select>
                    </div>
                </div>
                <div class="brand-input-wrapper">
                    <div class="brand-input-box">
                        <input type="text" name="brand-name" id="brand-name" placeholder="Brand">
                    </div>
                </div>
                <div class="store-input-wrapper">
                    <div class="store-input-box">
                        <input type="text" name="store-name" id="store-name" placeholder="Store">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const doneButton = document.getElementById('done-button');

            doneButton.addEventListener('click', (event) => {
                let nameInput = document.getElementById("product-name").value;

                if(nameInput) {
                    document.querySelector('.form-wrapper form').submit();                    
                } else {
                    const formWrapper = document.querySelector('.name-input-box');
                    const errorMessage = document.querySelector('.error-message-wrapper');
                    formWrapper.style.border = "solid #ff3030 3px"
                    errorMessage.style.display = "flex";
                }
            });

            const imageInput = document.getElementById('product-image');
            const previewImage = document.getElementById('previewImage');

            imageInput.addEventListener('change', function() {
                const file = imageInput.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewImage.src  = "";
                }
            });
        });
    </script>
</body>
</html>