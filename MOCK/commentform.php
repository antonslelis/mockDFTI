<!DOCTYPE html>
<html>
<head>
<title>Blog System</title>
<link rel='stylesheet' type='text/css' href='blog.css' />
</head>
<body>
<?php



// Q10. Complete the statement to read the ID from the query string into $id.
$id = $_GET['eid'];

// Connect to the database
// Please use your TCA username, password and database name here

$conn = new PDO ("mysql:host=localhost;dbname=ephp036;", "ephp036", "koogaiwu");

// Q13. Complete the SQL SELECT statement to retrieve the details for the blog with the selected ID
$result = $conn->query ("SELECT * FROM bg_entries WHERE id='$id'");
$blogrow = $result->fetch();

// Q14. Display the blog entry
	echo "<table>
			<tr>
				<td>".$blogrow['title']."</td>
				<td>".$blogrow['fulldetails']."</td>
				<td>".$blogrow['username']."</td>
				<td><a href='like.php?eid=".$blogrow['ID']."'>".$blogrow['likes']."</a></td>
			</tr>
		</table>";
// Q11. Complete the form to allow the user to submit a comment.
// There should be a text field or text area for the comment, and a hidden field
// containing the blog entry ID. This form should submit to addcomment.php.

echo "<form method='post' action='addcomment.php'>";
echo "Comment: ";
echo '<textarea name="comment">Please enter your comment...</textarea>
		<br />';
echo "<input type='hidden' name='eid' value=".$id." /> ";
echo "<input type='submit' value='Go!' />";
echo "</form>";

?>
</body>
</html>