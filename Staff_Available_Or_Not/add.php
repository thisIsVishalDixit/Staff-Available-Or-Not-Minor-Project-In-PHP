<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <a href="add_staff.php">Add Staff</a>
        <a href="add.php">Add Availability</a>
        <a href="display.php">Staff List</a>
        <a href="check.php">Check Availability</a>
       
    </nav>
&nbsp;<h1>Add Availability</h1>
<form action="add_availability.php" method="post">
    <label for="staff_id">Select Staff:</label>
    <select name="staff_id" required>
        <?php
        include 'staff_dropdown.php';
        ?>
    </select>

    <label for="day">Select Day:</label>
    <input type="text" name="day" placeholder="E.g., Monday" required>

    <label for="start_time">Start Time:</label>
    <input type="text" name="start_time" placeholder="E.g., 09:00 AM" required>

    <label for="end_time">End Time:</label>
    <input type="text" name="end_time" placeholder="E.g., 05:00 PM" required>
    <br>

    <input type="submit" value="Add Availability">
</form>
<h2><a href="index.php"><button>HOME</button></a></h2>
</body>
</html>





