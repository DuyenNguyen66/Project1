<?php
	$maTl=$_GET["maTl"];
	
	include("../../modules/open.php");
	$sql="delete from tbltheloai where maTl=$maTl";
	mysqli_query($conn,$sql);
	
	include("../../modules/close.php");
	header("location:../nhanVien.php?dog=7");
?>