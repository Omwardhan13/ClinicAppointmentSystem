<?php
session_start();

// Check if the user is logged in and if they are a doctor
if (!isset($_SESSION['doctor_logged_in']) || $_SESSION['doctor_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "clinic_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient data from the database
$sql = "SELECT name, age, sex, contact, illness FROM patients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Information</title>
    <link rel="stylesheet" href="view_patients.css">
</head>
<body>
    <h2>Patient Information</h2>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Illness</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sex']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['illness']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No patient records found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>
