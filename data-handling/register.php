<?php
require "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $confirmPassword = $_POST["confirm_password"];

    if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('Please fill in all required fields.');</script>";

    } elseif ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            header("Location: ../register.php?error=email_exists");
            exit();
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashedPassword')";
            if (mysqli_query($conn, $sql)) {
                
                session_start();
                $_SESSION['user_id'] = mysqli_insert_id($conn);
                $_SESSION['username'] = $username;
                $myList = "My List";
                $userId = $_SESSION['user_id'];

                $sql = "INSERT INTO lists (user_id, name) VALUES ('$userId', '$myList')";
                mysqli_query($conn, $sql);

                header("Location: ../index.php");
                exit();
            }
        }
    }
}

mysqli_close($conn);
?>