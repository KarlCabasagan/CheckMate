<?php
require "db_conn.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dateCreated = date('Y-m-d H:i:s');

    if ($password !== $confirm_password) {
        $error_message = urlencode("Passwords do not match.");
        header('Location: register.html?error=' . $error_message);
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $error_message = urlencode("Username or email already exists.");
        header('Location: register.html?error=' . $error_message);
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO users (email, username, password, dateCreated) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$email, $username, $hashed_password, $dateCreated])) {
        header('Location: login.html');
        exit;
    } else {
        $error_message = urlencode("Failed to register user.");
        header('Location: register.html?error=' . $error_message);
        exit;
    }
}
?>
