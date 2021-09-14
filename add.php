<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>

	<?php

		$servername="localhost";
		$username="root";
		$password="";
		$dbname="StudentManagementSystem";
		$conn= new mysqli($servername,$username,$password,$dbname);

		if ($conn->connect_error) {
			echo "Connection to database error".$conn->connect_error;
		}
		$fname=$_GET["fname"];
		$lname=$_GET["lname"];
		$mname=$_GET["mname"];
		$email=$_GET["email"];
		$id=$_GET["id"];
		$dob=$_GET["dob"];

		$sql="INSERT INTO Students(id,fname,lname,Middlename,Email,DOB) values('$id','$fname','$lname','$mname','$email','$dob')";

		if($conn->query($sql)===True){
			echo '<script type="text/javascript">console.log("Data added successfully");</script>';
			echo "Data Added Successfully";
		}
		else{
			echo "Error adding data<br>".mysqli_error($conn);
		}



	  ?>
	  <br>
	  <button><a href="home.php">Back Home</a></button>

</html>