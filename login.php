<?php
include "data-handling/db_conn.php";
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login-register.css">
    <link rel="icon" href="images/logo-icon.png">
    <title>CheckMate - Login</title>
</head>
<body>
    <div class="container">
        <div class="logo-wrapper">
            <img id="logo" src="images/checkMate.png" alt="logo">
        </div>
        <div class="login-form-wrapper">
            <div id="error-message" style="color: red; display: none;"></div>

            <form id="login-form" method="POST" action="./data-handling/login.php">
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email-input" required>
                </div>
                <div>
                    <span>Password</span>
                    <input type="password" name="password" id="password-input" required>
                </div>
                <div class="login-button-wrapper">
                    <button type="submit" id="login-button">Login</button>
                </div>
            </form>
            <div class="sign-up-wrapper">
                <span id="sign-up">Don't have an account? <a href="register.php"> Sign up </a> now</span>
            </div>
        </div>
    </div>

    <script>
        function removeParameter(paramName) {
            const url = new URL(window.location.href);
            url.searchParams.delete(paramName);
            window.location.href = url.toString();
        }

        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        if (error) {
            alert('Incorrect username or password');
            removeParameter("error");
        }
    </script>
</body>
</html>
