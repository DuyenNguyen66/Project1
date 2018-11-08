<?php 
	$ma=$_GET["maNv"];
	
	include('../../modules/open.php');
	
	$sql="delete from tblnv where maNv=$ma";
	mysqli_query($conn,$sql);
	
	include('../../modules/close.php');
	header("location:../admin.php?dog=1");
?>