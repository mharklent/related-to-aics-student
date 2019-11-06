<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$studentid = $_POST['studentid'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];	
	
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($age) || empty($gender)) {	
			
		if(empty($firstname)) {
			echo "<font color='red'>Firstname field is empty.</font><br/>";
		}
			
		if(empty($lastname)) {
			echo "<font color='red'>Lastname field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$sql = "UPDATE student SET firstname=:firstname, lastname=:lastname, age=:age, gender=:gender WHERE studentid=:studentid";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':studentid', $studentid);
		$query->bindparam(':firstname', $firstname);
		$query->bindparam(':lastname', $lastname);
		$query->bindparam(':age', $age);
		$query->bindparam(':gender', $gender);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$studentid = $_GET['studentid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM student WHERE studentid=:studentid";
$query = $dbConn->prepare($sql);
$query->execute(array(':studentid' => $studentid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$age = $row['age'];
	$gender = $row['gender'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Firstname</td>
				<td><input type="text" name="firstname" value="<?php echo $firstname;?>"></td>
			</tr>
			<tr> 
				<td>Lastname</td>
				<td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="studentid" value=<?php echo $_GET['studentid'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
