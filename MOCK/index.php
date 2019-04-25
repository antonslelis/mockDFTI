<!DOCTYPE html>
<html>
<head>
<title>Blog System</title>
<link rel='stylesheet' type='text/css' href='blog.css' />
</head>
<body>
<h1>Solent Developers Blog</h1>
<p>
<a href='addentry.html'>Add a new entry</a> | <a href='login.html'>Login</a> </p>
<?php



// Connect to the database
// Please use your TCA username, password and database name here
// Database name is same as username

$conn = new PDO ("mysql:host=localhost;dbname=ephp036;", "ephp036", "koogaiwu");

// Q1. Complete the SELECT statement below so that ALL blog entries from the database
// are retrieved.

$result = $conn->query ("SELECT * FROM bg_entries");

// This code prints out any SQL error messages and can be used for debugging - comment out to test
//echo "<p><strong>SQL Errors:</strong>";
//print_r($conn->errorInfo());
//echo "</p>";

echo "<table>
		<tr>
			<th>Title</th>
			<th>Full details</th>
			<th>User</th>
			<th>Likes</th>
			<th>Add comment</th>
			<th>Comments</th>
			<th>Edit entry</th>
		</tr>
		";
while ($row = $result->fetch())
{
	// Q2. Add code inside the "while" loop to display the title, full details,
	// username (of the user who posted the entry) and number of likes for each blog entry
	echo "<tr>
			<td>".$row['title']."</td>
			<td>".$row['fulldetails']."</td>
			<td>".$row['username']."</td>
			<td><a href='like.php?eid=".$row['ID']."'>".$row['likes']."</a></td>
			<td><a href='commentform.php?eid=".$row['ID']."'>Click here</a></td>
			";
	
	// Q3 Add a hyperlink to "like.php". This should include a query string containing
	// the ID of the current blog entry, to allow the user to "like" that entry.
	
	// Q9 Add a hyperlink to "commentform.php". This should include a query string containing
	// the ID of the current blog entry, to allow the user to comment on that entry.

	// Q15. Show the APPROVED comments for the current blog entry below the details of the entry.
	// The comments table has an approved column representing approved status
	// You will need to manually change the value of the "approved" column to 1 in PHPMyAdmin to test this out 
	// e.g. go to the SQL tab and enter an appropriate UPDATE statement, or edit the record using the GUI
	$rid=$row['ID'];
	$apcom=$conn->query ("SELECT * FROM bg_comments WHERE approved='1' AND entry_ID='$rid'");
	echo "<td>";
	while ($comrow = $apcom->fetch()){
		echo $comrow["the_comment"];
		echo "<br>
			<br>";
	}
	echo "</td>
		";	
	// Q16. Add a hyperlink to "editentryform.php". This should include a query string containing
	// the ID of the current blog entry, to allow the user to edit that entry.
	echo "<td><a href='editentryform.php?eid=".$row['ID']."'>Click to Edit</a></td></tr>";

}
echo "</table>";




?>
</body>
</html>
