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
    <title>CheckMate - Register</title>
</head>
<body>
    <div class="container">
        <div class="logo-wrapper">
            <img id="logo" src="images/checkMate.png" alt="logo">
        </div>
        <div class="register-form-wrapper">
            <div id="error-message" style="color: red; display: none;"></div>
            <form id="register-form" method="POST" action="data-handling/register.php">
                <div>
                    <span>Email</span>
                    <input type="email" name="email" id="email-input" required>
                </div>
                <div>
                    <span>Username</span>
                    <input type="text" name="username" id="username-input" required>
                </div>
                <div>
                    <span id="password-span" class="pass">Password</span>
                    <input type="password" name="password" id="password-input" required>
                </div>
                <div>
                    <span id="confirm-password-span" class="pass">Confirm Password</span>
                    <input type="password" name="confirm_password" id="confirm-password-input" required>
                </div>
                <div class="register-button-wrapper">
                    <button type="submit" id="register-button">Register</button>
                </div>
            </form>
            <div class="sign-up-wrapper">
                <span id="sign-up">Already have an account? <a href="login.php">Login</a> now</span>
            </div>
        </div>
    </div>

    <script>
        const registerForm = document.getElementById("register-form");

        registerForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const password = document.getElementById('password-input').value;
            const confirmPassword = document.getElementById('confirm-password-input').value;
            const passwordLabel = document.getElementById('password-span');
            const confirmPasswordLabel = document.getElementById('confirm-password-span');

            if (password != confirmPassword) {
                passwordLabel.style.color = "red";
                confirmPasswordLabel.style.color = "red";
            } else {
                registerForm.submit();
            }
        });

        function removeParameter(paramName) {
            const url = new URL(window.location.href);
            url.searchParams.delete(paramName);
            window.location.href = url.toString();
        }

        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        if (error) {
        alert('Email already exists');
        removeParameter("error");
        }
    </script>
</body>
</html>
