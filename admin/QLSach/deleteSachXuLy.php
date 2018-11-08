<?php
	$ma=$_GET["maSach"];
	
	include("../../modules/open.php");
	
	$sql="delete from tblsach where maSach=$ma";
	mysqli_query($conn,$sql);
	
	include("../../modules/close.php");
	header("Location:../admin.php?dog=2");
?>