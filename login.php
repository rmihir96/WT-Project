<!DOCTYPE html>

	<head>
		<title>Login Page</title>
		<!-- W3.CSS Framework-->
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
			.w3-navbar,h1,button {font-family: "Montserrat", sans-serif}
		</style>
	</head>
<body class="w3-pale-blue">
	<!-- Navbar -->
	<ul class="w3-navbar w3-blue w3-card-2 w3-top w3-left-align w3-large w3-row">
		<li class="w3-quarter w3-center"><h3>MentorSpot.com</h3></li>
		<li><a href="Homepage.html" class="w3-padding-large w3-hover-indigo">Return to home</a></li>
	</ul> 
	<div class="w3-container w3-padding-128">
	<ul class="w3-navbar">
      	   <li class="w3-half tablink"><a id="std_btn" href="javascript:void(0)" class="w3-light-blue w3-xlarge w3-center w3-hover-indigo" onclick="changeTab('Student')">Student</a></li>
      	   <li class="w3-half tablink"><a id="mnt_btn" href="javascript:void(0)" class="w3-light-blue w3-xlarge w3-center w3-hover-indigo" onclick="changeTab('Mentor')">Mentor</a></li>
         </ul>
	<div class="w3-card-16 w3-container">
		 <div id="Student" class="" >
      			<h3 class="w3-center">Hello Student!</h3>
      			<form class="w3-container" action="checkstudlogin.php" method="post">
				  <label>Username:</label>
 	   			  <input class="w3-input w3-margin-top w3-margin-bottom" type="text" name="username" required="required" placeholder="username" />
				  <label>Password:</label>	
                  <input class="w3-input w3-margin-top w3-margin-bottom" type="password" name="password" required="required" placeholder="password" />
                  <input class="w3-btn w3-blue w3-hover-indigo w3-margin-top w3-margin-bottom" type="submit" value="Login"/> 
 	            </form>
				<p class="w3-center"><a href="registration.php">Create account</a></p>
         </div> 
	     <div id="Mentor" class="" style="display:none;">
  				<h3 class="w3-center">Hello Mentor!</h3>
  				<form class="w3-container" action="checkmenlogin.php" method="post">
				  <label>Username:</label>	
 	   			  <input class="w3-input w3-margin-top w3-margin-bottom" type="text" name="username" required="required" placeholder="username" />
				  <label>Password:</label>	
                  <input class="w3-input w3-margin-top w3-margin-bottom" type="password" name="password" required="required" placeholder="password" />
                  <input class="w3-btn w3-blue w3-hover-indigo w3-margin-top w3-margin-bottom" type="submit" value="Login"/> 
 	            </form>
				<p class="w3-center"><a href="registration.php">Create account</a></p>
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