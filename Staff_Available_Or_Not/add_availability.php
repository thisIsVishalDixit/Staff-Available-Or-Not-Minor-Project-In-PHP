<?php
// Add staff availability
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add availability
    $staffId = $_POST["staff_id"];
    $day = $_POST["day"];
    $startTime = $_POST["start_time"];
    $endTime = $_POST["end_time"];

    $sql = "INSERT INTO availability (staff_id, day, start_time, end_time) VALUES
     ('$staffId', '$day', '$startTime', '$endTime')";

    if ($conn->query($sql) === TRUE) {
        echo "Availability added successfully!";
    } else {
        echo "Error adding availability: " . $conn->error;
    }
}

$conn->close();
?>
