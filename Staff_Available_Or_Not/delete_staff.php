<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch staff name before deleting
    $select_sql = "SELECT name FROM staff WHERE id=$id";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $staffName = $row["name"];

        // Delete the record
        $delete_sql = "DELETE FROM staff WHERE id=$id";

        if ($conn->query($delete_sql) === TRUE) {
            echo "<div style='color: green; font-weight: bold;'>Record with ID $id and Staff Name '$staffName' deleted successfully.</div>";
        } else {
            echo "<div style='color: red;'>Error deleting record: " . $conn->error . "</div>";
        }
    } else {
        echo "<div style='color: red;'>Error: Staff with ID $id not found.</div>";
    }
}

$conn->close();
?>
