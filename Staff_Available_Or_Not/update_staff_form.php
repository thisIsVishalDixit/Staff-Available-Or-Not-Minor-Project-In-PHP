<?php
// Include database connection logic if not already included
// Include any necessary validation or security measures

// Check if the staff ID is set in the URL
if (isset($_GET['id'])) {
    // Retrieve staff ID from the URL parameter
    $staffId = $_GET['id'];

    // Fetch staff information from the database based on the ID
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch staff details and availability from the database using a JOIN
    $sql = "SELECT staff.id, staff.name, staff.role, availability.day, availability.start_time, availability.end_time
            FROM staff
            LEFT JOIN availability ON staff.id = availability.staff_id
            WHERE staff.id = $staffId";
    
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        // Initialize variables
        $availabilityDetails = array();
        $currentStaffName = $currentRole = $currentDay = $currentTime = '';

        // Fetch staff details
        $row = $result->fetch_assoc();
        $currentStaffName = $row['name'];
        $currentRole = $row['role'];

        // Fetch availability details
        do {
            $currentDay = $row['day'];
            $currentTime = $row['start_time'] . ' - ' . $row['end_time'];
            $availabilityDetails[] = array('day' => $currentDay, 'time' => $currentTime);
        } while ($row = $result->fetch_assoc());

        $conn->close();
    } else {
        // Redirect to an error page or the index.php page if staff ID is not found
        header("Location: index.php");
        exit();
    }
} else {
    // Redirect to an error page or the index.php page if accessed without a valid staff ID
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff Information</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Update Staff Information</h1>

    <!-- Update staff form -->
    <form action="update_staff.php" method="post">
        <!-- Display current staff information for reference -->
        <label for="current_name">Current Staff Name:</label>
        <input type="text" name="current_name" value="<?php echo htmlspecialchars($currentStaffName); ?>" readonly>

        <label for="current_role">Current Role:</label>
        <input type="text" name="current_role" value="<?php echo htmlspecialchars($currentRole); ?>" readonly>

        <!-- Display current availability -->
        <label for="current_availability">Current Availability:</label>
        <?php
        if (!empty($availabilityDetails)) {
            foreach ($availabilityDetails as $availability) {
                echo "<p>{$availability['day']}: {$availability['time']}</p>";
            }
        } else {
            echo "<p>No availability set.</p>";
        }
        ?>

        <!-- Update staff information -->
        <label for="new_name">New Staff Name:</label>
        <input type="text" name="new_name" required>

        <label for="new_role">New Role:</label>
        <input type="text" name="new_role" required>

        <!-- New fields for day and time -->
        <label for="new_day">New Day:</label>
        <input type="text" name="new_day" placeholder="E.g., Monday" required>

        <label for="new_start_time">New Start Time:</label>
        <input type="text" name="new_start_time" placeholder="E.g., 09:00 AM" required>

        <label for="new_end_time">New End Time:</label>
        <input type="text" name="new_end_time" placeholder="E.g., 05:00 PM" required>

        <input type="hidden" name="staff_id" value="<?php echo $staffId; ?>">

        <input type="submit" value="Update Staff">
    </form>

</body>

</html>
