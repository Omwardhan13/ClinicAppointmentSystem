<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$contact = $_POST['contact'];
$illness = $_POST['illness'];

// Generate a unique token
$token = uniqid('PAT-');

// Insert patient data into the database along with the token
$sql = "INSERT INTO patients (name, age, sex, contact, illness, token) VALUES ('$name', '$age', '$sex', '$contact', '$illness', '$token')";

if ($conn->query($sql) === TRUE) {
    // Redirect to confirmation page and pass the token
    header("Location: confirmation.php?token=$token");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
