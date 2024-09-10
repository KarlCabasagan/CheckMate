<?php
session_start();

if (isset($_SESSION['user_id'])) {
    echo "You are logged in.";
} else {
    echo "You are not logged in.";
}