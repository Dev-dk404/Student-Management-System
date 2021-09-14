<!DOCTYPE html>
<html>
<head>
	<title>Search Database</title>
</head>
<body>
	<p>Please Enter the Sutdent's ID that you want to search below:</p>
	<form action="search.php" method="get">
		<input type="Search" name="search" placeholder="Enter Student Number"><br>
		<br>
		<input type="Submit" name="submit">
	</form>
	<br>


	<?php 
		
	if (!empty($_GET["search"])){
			$input=$_GET["search"];
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="StudentManagementSystem";
			$conn= new mysqli($servername,$username,$password,$dbname);
			//connecting to database
		if ($conn->connect_error) {

				echo "Database connection error....check code".$conn->conn_error;
			}

		else{
			//writing sql query to search the student inputed
			$sql="SELECT * from Students where id='$input'";

			//executing the query
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
	 		 // output data of each row
			  while($row = $result->fetch_assoc()) {
			    echo "<b>Student Number:</b> " . $row["id"]. " <b>Name: </b>" . $row["fname"]. " " . $row["Middlename"]." ".$row["lname"]." "."<b>Email:</b>".$row["Email"]." "."<b>Date of Birth:</b>".$row["DOB"]."<br>";
			  }
			}
			 else {
			  echo "0 results"."<br>No student has that id";
			}
		}

		$conn->close();

	}//end of 


	 ?>
	 <br>
	 <hr>
	 <button><a href="home.php">Home</a></button>

</body>
</html>