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

// Connect to the database
// Please use your TCA username, password and database name here

$conn = new PDO ("mysql:host=localhost;dbname=ephp036;", "ephp036", "koogaiwu");

$id = $_POST['eid'];
$det = $_POST['newdet'];
$conn->query ("UPDATE bg_entries SET fulldetails='$det' WHERE ID='$id'");
// Q17. Complete editentry.php to actually change the entry's details in the database

?>
</body>
</html>