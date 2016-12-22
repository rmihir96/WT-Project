<?php
	//Connect to server and database
	$conn=new mysqli("localhost", "root","","first_db");
	//Checking Connection eshtablished or not
	if ($conn->connect_error) {
		die("Connection Failed" . $conn->connect_error);
	}
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	</style>
	<script src="https://use.fontawesome.com/d18274d1d9.js"></script>
	<script>
		function ajax(){
			
			var req = new XMLHttpRequest();
			req.onReadyStateChange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementByID('chat').innerHTMl = req.response.Text;
				}
			}	
			req.open('GET','chat.php',true);
			req.send();
		}
		setInterval(function(){ajax()},1000);
	</script>
</head>	
<body class="w3-theme-l5" onload="ajax();">
<!-- Navbar -->
	<ul class="w3-navbar w3-blue w3-card-2 w3-top w3-left-align w3-large" id="homehead">
		<li class="w3-quarter w3-center"><h3>MentorSpot.com</h3></li>
		<li><a href="../Homepage.html" id="homehead" class="w3-padding-large w3-hover-indigo">Return to Home</a></li>
		<li><a href="#cus" class="w3-padding-large w3-hover-indigo">Contact Us</a></li>
		<li><a href="logout.php" class="w3-padding-large w3-hover-indigo" name="logout" >Logout</a></li>
	</ul>
	
<!-- Page Container -->
<div class="w3-container w3-content " style="max-width:90%;margin-top:80px" id="homehead">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center" id="#display_name"> <?php echo $_SESSION['user'] ?> </h4>
         <p class="w3-center"><i class="fa fa-street-view" style="font-size:120px;"></i></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"> <?php echo $_SESSION['course'] ?> </i></p>
        </div>
      </div>
      <br>
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    <!-- Send Message from here -->
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Message here:</h6>
			  <form method="post" action="profile.php">
              <input type="text" contenteditable="true" name="msg" placeholder="message" />
              <input type="Submit" name="submit" value="Post" />
			  <?php if(isset($_POST['submit'])){
				$msg=$_POST['msg'];
				$username=$_SESSION['user'];
				$query="INSERT INTO Python_chat (username,message) values ('$username','$msg')";
				$run=mysqli_query($conn,$query);
				}
				?>
			  </form>
            </div>
          </div>
        </div>
      </div>
	  
	  <!-- Chat Area -->
	  <div class="w3-row-padding">
		<div class="w3-col w3-card-16">
			<h3>Chat Area</h3>
			<div id="chat"></div>
			<div class="w3-card-2 w3-padding-8 w3-margin-top w3-margin-bottom">
				<span class="w3-text-green">Admin</span>
				<span class="w3-text-brown">Welcome to Python</span>
				<span class="w3-text-red" style="float:right;">2016/11/10 22:00:00</span>
			</div>
		</div>
	  </div>
       
    <!-- End Middle Column -->
    </div> 
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Contact Us/Footer -->
	<footer class="w3-container w3-blue w3-padding-16" id="cus">
		<h3>Contact Us</h3>
		<p>Created by <strong>DMCE-B3-45-52-57-58</strong></p>
		<p>Email for business : <strong>secompsb3@gmail.com</strong></p>
		<div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
			<span class="w3-text w3-theme-dark w3-padding">Go To Top</span> 
			<a class="w3-text-black" href="#homehead"><span class="w3-xlarge">
			<i class="fa fa-hand-pointer-o"></i></span></a>
		</div>
	</footer>
</body>
</html>

