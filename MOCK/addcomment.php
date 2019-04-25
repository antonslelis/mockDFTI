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

// Q12. Complete addcomment.php so that it:
// - reads the entry ID and the comment from the form on commentform.php;
// - adds an entry to the bg_comments table containing the entry ID, the comment, and the user
// who posted the comment. The approved column should be set to 0
$id=$_POST["eid"];
$com=$_POST["comment"];
$uname = $_SESSION["loggedinuser"];
$conn->query ("INSERT INTO bg_comments(username, entry_ID, the_comment, approved) VALUES ('$uname', '$id', '$com', '0')");


?>
</body>
</html>