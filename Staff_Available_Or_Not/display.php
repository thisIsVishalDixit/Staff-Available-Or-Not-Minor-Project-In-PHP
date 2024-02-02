<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<nav>
        <a href="add_staff.php">Add Staff</a>
        <a href="add.php">Add Availability</a>
        <a href="display.php">Staff List</a>
        <a href="check.php">Check Availability</a>
       
    </nav>
<h2>Staff List</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Role</th><th>Actions</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['role']}</td>";
        echo "<td>";
        echo "<a href='update_staff_form.php?id={$row['id']}'>Update</a> | ";
        echo "<a href='delete_staff.php?id={$row['id']}'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No staff members found.";
}

$conn->close();
?>

<!-- Add a button outside the table if needed -->
<br><br>
<button onclick="location.href='add_staff.php'">Add Staff</button>

</body>
</html>
