<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>
	<p>Please Enter the Sutdent's ID that you want to update below:</p>
	<form action="update.php" method="get">
		<input type="number" name="id" placeholder="Enter Student Number"><br>
		<br>
		<input type="Submit" name="submit">
		<br>
		<hr>
	</form>

<?php  
	if(!empty($_GET['id'])){
		//connecting to database
		$input=$_GET["id"];
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="StudentManagementSystem";
		$conn= new mysqli($servername,$username,$password,$dbname);

		if ($conn->connect_error) {

				echo "Database connection error....check code".$conn->conn_error;
			}
		else{
		
			//writing sql query to get student details
			$sql="SELECT * from Students where id='$input'";
			$result = $conn->query($sql);

			if ($result->num_rows>0) {		
				$row=$result->fetch_assoc();
				//making variables for each rows
				$fname=$row["fname"];
				$mname=$row["Middlename"];
				$lname=$row["lname"];
				$dob=$row["DOB"];
				$email=$row["Email"];			


				//displaying student details on html form
				echo "
				<html>
				<body>
			<form action='actualUpdate.php' method='get'>
			Student Number:$input<br>
			<input type='hidden' name='id' value='$input'>
			First Name: <input type='text' name='fname' required value='$fname'><br>
			Last Name: <input type='text' name='lname' value='$lname' required><br>
			Middle Name: <input type='text' name='mname' value='$mname'><br>
			Email: <input type='Email' name='email' value='$email'required><br>
			Date of Birth: <input type='Date' name='dob' value='$dob' required><br>
			<input type='Submit' name='submit'>

				</form>
				</body>
				</html>
				";

			}

			else
			{
				echo "No records";
			}

		}
	}


?>
<br>
<hr>
<button><a href="home.php">Home</a></button>

</body>
</html>



<!-- <html>
			<body>
		<form action="add.php" method="get">
		First Name: <input type="text" name="fname" value="$fname" required><br>
		Last Name: <input type="text" name="lname" value="$lname" required><br>
		Middle Name: <input type="text" name="mname" value="$mname"><br>
		Email: <input type="Email" name="email" value="$email"required><br>
		Student Number: <input type="hidden" name="id" value="$input" required><br>
		Date of Birth: <input type="Date" name="dob" value="$dob" required><br>
		<input type="Submit" name="submit">

			</form>
			</body>
			</html> -->