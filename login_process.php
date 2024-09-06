<?php
session_start();

$valid_username = "doctor";
$valid_password = "password123";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['doctor_logged_in'] = true;
    header("Location: view_patients.php");
    exit();
} else {
    echo "Invalid username or password.";
}
?>