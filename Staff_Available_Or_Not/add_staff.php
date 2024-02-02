<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Staff</title>
 
<link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <a href="add_staff.php">Add Staff</a>
        <a href="add.php">Add Availability</a>
        <a href="display.php">Staff List</a>
        <a href="check.php">Check Availability</a>
       
    </nav>
<h1> Add Staff</h1>

<form action="process.php" method="post">
    <label for="name">Staff Name:</label>
    <input type="text" name="name" required>

    <label for="role">Role:</label>
    <input type="text" name="role" required>

    <input type="submit" value="Add Staff">

   
</form>
<h2><a href="index.php"><button>HOME</button></a></h2>


</body>
</html>



