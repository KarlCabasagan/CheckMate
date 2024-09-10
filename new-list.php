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
    <link rel="stylesheet" href="css/add-list.css">
    <link rel="icon" href="images/logo-icon.png">
    <title>CheckMate</title>
</head>
<body>
    <div class="container">
        <div class="header-wrapper">
            <div class="header-left-wrapper">
                <div class="close-button-wrapper" onclick="history.back();">
                    <button id="close-button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m252-176-74-76 227-228-227-230 74-76 229 230 227-230 74 76-227 230 227 228-74 76-227-230-229 230Z"/></svg>
                    </button>
                </div>
                <div class="create-new-list-wrapper">
                    <span>Create new list</span>
                </div>
            </div>
            <div class="done-button-wrapper">
                <button id="done-button">
                    Done
                </button>
            </div>
        </div>
        <div class="new-list-form-wrapper">
            <form id="new-list-form" action="./data-handling/new-list.php" method="POST">
                <input type="text" name="new-list" id="new-list" placeholder="Enter list name">
            </form>
        </div>
    </div>
    <script>
        const doneButton = document.getElementById('done-button');
        const form = document.getElementById('new-list-form');
        doneButton.addEventListener('click', (event) => {
            form.submit();
        });
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