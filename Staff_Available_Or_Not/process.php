<?php
// CRUD operations

// Connect to the database (Replace these credentials with your actual database details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add staff
    $name = $_POST["name"];
    $role = $_POST["role"];

    $sql = "INSERT INTO staff (name, role) VALUES ('$name', '$role')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error adding staff: " . $conn->error;
    }
}

$conn->close();
?>
