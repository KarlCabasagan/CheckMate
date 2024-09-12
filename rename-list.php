<?php
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
    <link rel="stylesheet" href="css/rename-list.css">
    <script type="module" src="./js/App.js"></script>
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
                    <span>Rename list</span>
                </div>
            </div>
            <div class="header-right-wrapper">
                <button>
                    <span>Done</span>
                </button>
            </div>
        </div>
    </div>
</body>
</html>