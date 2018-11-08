<?php
	if(isset($_POST["txtMa"]) && isset($_POST["txtPass"]) && isset($_POST["txtName"]) && isset($_POST["txtNum"]) && isset($_POST["txtAdd"]))
	{
		include("../modules/open.php");
		$maKh=$_POST["txtMa"];
		$pass=$_POST["txtPass"];
		$ten=$_POST["txtName"];
		$sdt=$_POST["txtNum"];
		$diaChi=$_POST["txtAdd"];
		$sql="update tblkh set pass='$pass', ten='$ten', sdt=$sdt, diaChi='$diaChi' where maKh=$maKh ";
		mysqli_query($conn,$sql);
		
		include("../modules/close.php");
		header("Location:../index.php?dog=6");
	}
?>