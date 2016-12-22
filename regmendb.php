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
  $query = $conn->query("Select * from users"); //Query the users table
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
    $sql=$conn->query("INSERT INTO users (username, password,Emailid,usrtel,course) VALUES ('$username','$password','$Emailid','$usrtel','$course')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
  }
}
?>