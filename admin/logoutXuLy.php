<?php
	session_start();
	if(isset($_SESSION["user"]) && isset($_SESSION["pass"]))
	{
		unset($_SESSION["user"]);	
		header('location:loginAd.php');
	}
?>