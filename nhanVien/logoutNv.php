<?php
	if(isset($_SESSION["userNv"]))
	{
		unset($_SESSION["userNv"]);
		header("Location:loginNv.php");
	}
?>