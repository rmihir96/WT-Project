<html>
	<head>
		<title>My first PHP website</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		
		<div class="container">
		 	
		 	 <div class="imgcontainer">
        		<img src="img_avatar2.png" alt="Avatar" class="avatar">
        	 </div>
           <form action="register.php" method="post">
			 <input type="text" name="username" required="required" placeholder="User name" /> 
			 <input type="text" id="email" name="Emailid" required="required" placeholder="Email Address">
			 <input type="password" name="password" required="required" placeholder="Password" /> 
			 <input type="submit" value="Register"/>
		   </form>	
		</div>
		
	</body>
</html>

<?php

	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$Emailid =  mysql_real_escape_string($_POST['Emailid']);
    $bool = true;
	$query = mysql_query("Select * from users"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO users (username, password,Emailid) VALUES ('$username','$password','$Emailid')"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
	}
}
?>