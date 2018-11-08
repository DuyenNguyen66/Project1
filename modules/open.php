<?php
	//create connection
	$conn= mysqli_connect("localhost","root","","project");
	
	
	/*//check connection
	if(!$conn)
	{
		die("Connection failed: ".mysqli_connect_error());	
	}else 
	{
		echo "Connected successfully";
	}*/
	mysqli_set_charset($conn,"utf8");
?>