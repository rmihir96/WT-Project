<?php
    session_start();
	unset($_SESSION['user']);
	session_destroy();
	print '<script>alert("Successfully logged out");</script>'; //Prompts the user
	header("location:..\login.php");
?>