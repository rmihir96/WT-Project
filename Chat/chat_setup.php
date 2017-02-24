<?php 
	//Connect to server and database
	$conn=new mysqli("localhost", "root","","first_db");
	//Checking Connection eshtablished or not
	if ($conn->connect_error) {
		die("Connection Failed" . $conn->connect_error);
	}
	session_start();
	$query = "CREATE TABLE python_chat(id int(11) PRIMARY KEY,username varchar(50),message varchar(255),date timestamp);";
	$run = $conn->($query);
?>
