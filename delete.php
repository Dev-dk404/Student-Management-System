<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
	<p>Please Enter the Sutdent's ID that you want to delete below:</p>
	<form action="delete.php" method="get">
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

				die("Database connection error....check code".$conn->conn_error);
			}
		else{

			$sql="DELETE FROM Students WHERE ID='$input'";

			if ($conn->query($sql) === TRUE) {
  				echo "Record deleted successfully";

				} 
			else {
  				echo "Error deleting record: " . $conn->error;
				}		

		}
}


?>
<br>
<hr>
<button><a href="home.php">Home</a></button>

</body>
</html>