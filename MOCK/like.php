<!DOCTYPE html>
<html>
<head>
<title>Blog System</title>
<link rel='stylesheet' type='text/css' href='blog.css' />
</head>
<body>
<?php

// like.php
// allows a user to "like" a blog entry

// Q4. Complete the statement below to read the ID from the query string into $id.

$id = $_GET['eid'];

// Connect to the database
// Please use your TCA username, password and database name here
// Database name is same as username

$conn = new PDO ("mysql:host=localhost;dbname=ephp036;", "ephp036", "koogaiwu");

// Q5. Complete the SQL statement below to increase the number of likes for this entry by one.

$conn->query ("UPDATE bg_entries SET likes=likes+1 WHERE ID=".$id);

// This code prints out any SQL error messages and can be used for debugging - comment out to test
//echo "<p><strong>SQL Errors:</strong>";
//print_r($conn->errorInfo());
//echo "</p>";


echo "Thank you for liking this entry! <a href='index.php'>Back to index page</a>";
?>
</body>
</html>
