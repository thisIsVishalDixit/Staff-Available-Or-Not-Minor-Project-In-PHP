<?php
// Include database connection logic if not already included
// Include any necessary validation or security measures

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated staff information from the form
    $staffId = $_POST["staff_id"];
    $newName = $_POST["new_name"];
    $newRole = $_POST["new_role"];

    // Retrieve new availability details from the form
    $newDay = $_POST["new_day"];
    $newStartTime = $_POST["new_start_time"];
    $newEndTime = $_POST["new_end_time"];

    // Perform a query to update the staff details using a prepared statement
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use a transaction to ensure atomicity
    $conn->begin_transaction();

    try {
        // Update staff details
        $updateStaffSQL = "UPDATE staff SET name = ?, role = ? WHERE id = ?";
        $stmt = $conn->prepare($updateStaffSQL);
        $stmt->bind_param("ssi", $newName, $newRole, $staffId);

        if (!$stmt->execute()) {
            throw new Exception("Error updating staff record: " . $stmt->error);
        }

        $stmt->close();

        // Update or insert availability details
        $updateAvailabilitySQL = "INSERT INTO availability (staff_id, day, start_time, end_time) 
                                 VALUES (?, ?, ?, ?) 
                                 ON DUPLICATE KEY UPDATE start_time = VALUES(start_time), end_time = VALUES(end_time)";
        $stmt = $conn->prepare($updateAvailabilitySQL);
        $stmt->bind_param("isss", $staffId, $newDay, $newStartTime, $newEndTime);

        if (!$stmt->execute()) {
            throw new Exception("Error updating availability record: " . $stmt->error);
        }

        $stmt->close();

        // Commit the transaction
        $conn->commit();

        // Redirect to the index.php page after updating
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
} else {
    // Redirect to an error page or the index.php page if accessed without a POST request
    header("Location: index.php");
    exit();
}
?>
