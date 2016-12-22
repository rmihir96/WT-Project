<?php 
	//Connect to server and database
	$conn=new mysqli("localhost", "root","","first_db");
	//Checking Connection eshtablished or not
	if ($conn->connect_error) {
		die("Connection Failed" . $conn->connect_error);
	}
	session_start();
	$query = "SELECT * FROM python_chat ORDER BY ID DESC";
	$run = $conn->($query);
	while($row = $run->fetch_assoc()) :
?>
<div class="w3-card-2 w3-padding-8 w3-margin-top w3-margin-bottom">
	<span class="w3-text-green"><?php echo $row['username']; ?></span>
	<span class="w3-text-brown"><?php echo $row['message']; ?></span>
	<span class="w3-text-red" style="float:right;"><?php echo $row['date']; ?></span>
</div>
<?php 
	endwhile; 
?>