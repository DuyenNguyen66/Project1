<?php
	if(isset($_GET["maKh"]))
	{
		$maKh=$_GET["maKh"];
		include("../../modules/open.php");
		$sql="delete from tblkh where maKh=$maKh";
		mysqli_query($conn,$sql);
		
		header("location:../admin.php?dog=9");
		include("../../modules/close.php");	
	}

?>