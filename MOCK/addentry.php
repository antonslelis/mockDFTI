<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Blog System</title>
<link rel='stylesheet' type='text/css' href='blog.css' />
</head>
<body>
<?php


// Q6. Complete the code below to read in the title and details from the form
$ti = $_POST["entry_title"];
$det = $_POST["entry_details"];

// Q7. Complete this statement to read the currently logged in user into the variable
// $uname (you will need to look at login.php to do this successfully)
$uname = $_SESSION["loggedinuser"];

// Connect to the database
// Please use your TCA username, password and database name here

$conn = new PDO ("mysql:host=localhost;dbname=ephp036;", "ephp036", "koogaiwu");

// Q8. Complete the SQL statement to add the blog entry into the bg_entries table.
// As well as the title and full details, the username of the currently-logged-in user should
// be added to the table.
$conn->query ("INSERT INTO bg_entries(title, fulldetails, username, likes) VALUES ('$ti', '$det', '$uname', '0')");

// This code prints out any SQL error messages and can be used for debugging - comment out to test
//echo "<p><strong>SQL Errors:</strong>";
//print_r($conn->errorInfo());
//echo "</p>";


echo "Thanks for your entry. <a href='index.php'>Back to main page</a>";
?>
</body>
</html>