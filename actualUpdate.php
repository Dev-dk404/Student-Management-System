<!DOCTYPE html>
<html>
<head>
	<title>ActualUpdate</title>
</head>
<body>
	<?php 

		$fname=$_GET['fname'];
		$lname=$_GET['lname'];
		$mname=$_GET['mname'];
		$dob=$_GET['dob'];
		$email=$_GET['email'];
		$id=$_GET['id'];

		$servername="localhost";
		$username="root";
		$password="";
		$dbname="StudentManagementSystem";
		$conn= new mysqli($servername,$username,$password,$dbname);

	if ($conn->connect_error) {

				echo "Database connection error....check code".$conn->conn_error;
			}
	else
	{
		$sql="UPDATE Students SET fname='$fname',lname='$lname',MiddleName='$mname',Email='$email',DOB='$dob' WHERE id='$id'";

		if ($conn->query($sql)===TRUE) {
			echo "Record updated successfully";
		}
		else{
			echo "Error updating".$conn->error;
		}
	}



		
	 ?>
	 <br>
	 <hr>
	 <button><a href="home.php">Home</a></button>

</body>
</html>