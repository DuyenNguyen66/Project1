<?php
	if(isset($_POST["maHd"]) && isset($_POST["soLuong"]) && isset($_POST["maSach"]))
	{
		$maHd=$_POST["maHd"];
		$soLuong=$_POST["soLuong"];
		$maSach=$_POST["maSach"];
		
		include("../../modules/open.php");
		$sql="update tblhoadonchitiet set soLuong=$soLuong where maHd=$maHd and maSach=$maSach";
		mysqli_query($conn,$sql);
		
		header("Location:../admin.php?dog=3");
		include("../../modules/close.php");
	}
?>