<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <a href="add_staff.php">Add Staff</a>
        <a href="add.php">Add Availability</a>
        <a href="display.php">Staff List</a>
        <a href="check.php">Check Availability</a>
       
    </nav>
<h1>Check Staff Availability</h1>

<form action="check_availability.php" method="post">
    <label for="day">Select Day:</label>
    <input type="text" name="day" placeholder="E.g., Monday" required>

    <label for="time">Select Time:</label>
    <input type="text" name="time" placeholder="E.g., 09:00 AM" required>

    <input type="submit" value="Check Availability">
</form>
<h2><a href="index.php"><button>HOME</button></a></h2>
</body>
</html>


