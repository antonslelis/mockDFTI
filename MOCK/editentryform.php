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

// Q16 continued. Complete editentryform.php so that it shows a form allowing
// the administrator to alter the blog entry (the full details, not the title).
// The current entry must be included in
// the form. The script must be accessible to users with administrator privilege
// only. The form should send its details to editentry.php.
if (isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"]==1){
	$id=$_GET["eid"];
	$row=$conn->query ("SELECT fulldetails FROM bg_entries WHERE ID='$id'");
	$res=$row->fetch();
	echo "<table>
			<tr>
			<th>Old comment</th>
			<th>New comment</th>
		</tr>";
	echo "<tr>
		<td>".$res["fulldetails"]."</td>
		<td>
			<form method='post' action='editentry.php'>
				<textarea name='newdet'>".$res["fulldetails"]."</textarea>
				<input type='hidden' name='eid' value=".$id." />
				<input type='submit' value='Go!' />
			</form>
		</td>
		</tr>";
	echo "</table>;";
}else{
	echo "<h1>YOU NEED TO BE ADMIN TO ACCESS THIS PAGE</h1>";
}
?>
</body>
</html>
