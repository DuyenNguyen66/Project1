<?php
	if(isset($_SESSION["userKh"]) && isset($_SESSION["passKh"]))
	{
		unset($_SESSION["userKh"]);
		unset($_SESSION["passKh"]);
		header("location:index.php?dog=0");	
	}
?>