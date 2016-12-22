<!DOCTYPE html> 
<html>
<head>
  <title>Registration</title>
   <link rel="stylesheet" type="text/css" href="framework\student.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- W3.CSS Framework-->
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<!-- jQuery and external JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="hp.js"></script>
		<script src="https://use.fontawesome.com/d18274d1d9.js"></script>
		<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
			.w3-navbar,h1,button {font-family: "Montserrat", sans-serif}
			.fa-anchor,.fa-coffee {font-size:200px}
		</style>
 </head>
 <body class="w3-pale-blue">
 
 <!-- Navbar -->
	<ul class="w3-navbar w3-blue w3-card-2 w3-top w3-left-align w3-large w3-row">
		<li class="w3-quarter w3-center"><h3>MentorSpot.com</h3></li>
		<li><a href="Homepage.html" class="w3-padding-large w3-hover-indigo">Return to home</a></li>
	</ul> 
 
 	<div class="w3-container w3-margin-top w3-padding-128">
        <ul class="w3-navbar">
      	   <li class="w3-half tablink"><a id="std_btn" href="javascript:void(0)" class="w3-light-blue w3-xlarge w3-center w3-hover-indigo" onclick="changeTab('Student')">Student</a></li>
      	   <li class="w3-half tablink"><a id="mnt_btn" href="javascript:void(0)" class="w3-light-blue w3-xlarge w3-center w3-hover-indigo" onclick="changeTab('Mentor')">Mentor</a></li>
         </ul>
		<div class="w3-card-16 w3-container w3-center">
		 <div id="Student">
      			<h3 class="w3-center">Register as a Student</h3>
      			<form class="w3-container" action="registration.php" method="post">
					<label>Username :</label>
					<input type="text" class="w3-input w3-margin-top w3-margin-bottom" name="username" required="required" placeholder="User name" /> 
					<label>E-mail :</label>
					<input type="text" class="w3-input w3-margin-top w3-margin-bottom" id="email" name="Emailid" required="required" placeholder="Email Address">
					<label>Telephone :</label>
					<input type="tel" class="w3-input w3-margin-top w3-margin-bottom" name="usrtel" placeholder="Phone Number" required="required">
					<label>Course :</label>
					<input type="text" class="w3-input w3-margin-top w3-margin-bottom" list="courses" name="course" placeholder="Course">
					<datalist id="courses">
						<option value="C">
						<option value="C++">
						<option value="HTML-CSS">
						<option value="Javascript">
						<option value="Python">
					</datalist>
					<label>Password :</label>
					<input type="password" class="w3-input w3-margin-top w3-margin-bottom" name="password" required="required" placeholder="Password" /> 
					<input class="w3-btn w3-blue w3-hover-indigo w3-margin-top w3-margin-bottom" type="submit" value="Register"/>
 	            </form>
         </div> 
	     <div id="Mentor" style="display:none;">
  				<h3 class="w3-center">Register as a Mentor</h3>
  				<form class="w3-container" action="regmendb.php" method="post">
					<label>Username :</label>
					<input type="text" class="w3-input w3-margin-top w3-margin-bottom" name="username" required="required" placeholder="User name" /> 
					<label>E-mail :</label>
					<input type="text" class="w3-input w3-margin-top w3-margin-bottom" id="email" name="Emailid" required="required" placeholder="Email Address">
					<label>Telephone :</label>
					<input type="tel" class="w3-input w3-margin-top w3-margin-bottom" name="usrtel" placeholder="Phone Number" required="required">
					<label>Course :</label>
					<input type="text" class="w3-input w3-margin-top w3-margin-bottom" list="courses" name="course" placeholder="Course">
					<datalist id="courses">
						<option value="C">
						<option value="C++">
						<option value="HTML-CSS">
						<option value="Javascript">
						<option value="Python">
					</datalist>
					<label>Password :</label>
					<input type="password" class="w3-input w3-margin-top w3-margin-bottom" name="password" required="required" placeholder="Password" /> 
					<input class="w3-btn w3-blue w3-hover-indigo w3-margin-top w3-margin-bottom" type="submit" value="Register"/>
 	            </form>
          </div>	
	</div>
 	</div>
<script>
function changeTab(next_tab)
{
		if(next_tab=='Mentor')
		{
			document.getElementById("Student").style.display="none";
			document.getElementById("Mentor").style.display="block";
		}
		else
		{
			document.getElementById("Student").style.display="block";
			document.getElementById("Mentor").style.display="none";
		}
		var tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-indigo", "");
    }
}
</script>	
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $Emailid =  $_POST['Emailid'];
  $usrtel =  $_POST['usrtel'];
  $course =  $_POST['course'];
    $bool = true;
  $query = $conn->query("Select * from students"); //Query the users table
  while($row = $query->fetch_assoc()) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("registration.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    $sql = $conn->query("INSERT INTO students (username, password, Emailid, usrtel, course) VALUES ('$username','$password','$Emailid','$usrtel','$course')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
  }
}
?>