<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM student ORDER BY studentid DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Firstname</td>
		<td>Lastname</td>
		<td>Age</td>
		<td>Gender</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['firstname']."</td>";
		echo "<td>".$row['lastname']."</td>";
		echo "<td>".$row['age']."</td>";
		echo "<td>".$row['gender']."</td>";	
		echo "<td><a href=\"edit.php?studentid=$row[studentid]\">Edit</a> | <a href=\"delete.php?studentid=$row[studentid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
