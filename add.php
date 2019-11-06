<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
		
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($age) || empty($gender)) {
				
		if(empty($firstname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
				
		if(empty($lastname)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO student(firstname, lastname, age, gender) VALUES(:firstname, :lastname, :age, :gender)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':firstname', $firstname);
		$query->bindparam(':lastname', $lastname);
		$query->bindparam(':age', $age);
		$query->bindparam(':gender', $gender);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
