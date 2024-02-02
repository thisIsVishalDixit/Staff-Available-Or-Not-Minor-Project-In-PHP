<?php
// Check staff availability based on day and time range

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check availability
    $day = $_POST["day"];
    $time = $_POST["time"];

    // Format the input time to match the database time format
    $formattedTime = date("H:i:s", strtotime($time));

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT staff.name, availability.start_time, availability.end_time
            FROM staff
            LEFT JOIN availability ON staff.id = availability.staff_id
            WHERE availability.day = ? AND ? BETWEEN availability.start_time AND availability.end_time";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $day, $formattedTime);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        echo "Error executing query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "<h3>Staff Available on $day at $time:</h3>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['name']} - ({$row['start_time']} to {$row['end_time']})</li>";
            }
            echo "</ul>";
        } else {
            echo "No staff available on $day at $time.";
        }
    }

    $stmt->close();
}

$conn->close();
?>
