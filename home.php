<!DOCTYPE html>
<html>
<head>
	<title>Griffith's Student Management System</title>
</head>
<body>
	<center><h2><b>Griffith's Student Management System</b></h1></center>
	<center><img src="logo.png" width="30%"></center>
	
		<ul>
			<li><a href="add.html">Add Data</a></li>
			<li><a href="search.php">Search</a></li>
			<li><a href="update.php">Update</a></li>
			<li><a href="delete.php">Delete</a></li>
		</ul>
	
	<hr>
</body>
<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="StudentManagementSystem";
		//connecting with server
		$conn= new mysqli($servername,$username,$password);

		if($conn->connect_error){
			die("connection failed".$conn->connect_error);
		}
		
		//creating database
		$sql="CREATE DATABASE IF NOT EXISTS	StudentManagementSystem";
		if($conn->query($sql)===True){
		echo '<script type="text/javascript">console.log("Database created successfully");</script>';
		}
		else{
			echo "Error creating database".$conn->error;
		}
		//connecting with database
		$conn1= new mysqli($servername,$username,$password,$dbname);

		if($conn1->connect_error){
			die("connection failed".$conn1->connect_error);
		}

		//create table
		$sql1="CREATE TABLE IF NOT EXISTS Students(
				id int PRIMARY KEY,
				fname varchar(40) not null,
				lname varchar(40) not null,
				Middlename varchar(40),
				Email varchar(100) not null,
				DOB DATE not null)";
		if($conn1->query($sql1)===True){
			echo '<script type="text/javascript">console.log("Table created successfully");</script>';
		}
		else{
			echo "Error creating table". $conn1->error;
		}
		//fetching data from table
		$sql2="SELECT * from Students";
		$result = $conn1->query($sql2);

		if ($result->num_rows > 0) {
 		 // output data of each row
		  while($row = $result->fetch_assoc()) {
		    echo "<b>Student Number:</b> " . $row["id"]. " <b>Name: </b>" . $row["fname"]. " " . $row["Middlename"]." ".$row["lname"]." "."<b>Email:</b>".$row["Email"]." "."<b>Date of Birth:</b>".$row["DOB"]."<br>";
		  }
		} else {
		  echo "0 results";
		}
		// if($conn1->query($sql1)===True){
		// 	echo '<script type="text/javascript">console.log("Data retrieved successfully");</script>';
		// }
		// else{
		// 	echo "Error fetching data from database<br>".$conn1->error;
		// }


	  ?>
</html>
<style type="text/css">
	body{
		margin: 10%;
		background-color: #F3F3F3;
	}

	a{
		text-decoration:none;
		color: green;
		

	}
	li{
		list-style-type: none;
		padding: 8px;

	}





</style>