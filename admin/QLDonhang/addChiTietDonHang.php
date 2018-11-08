<?php
	if(isset($_GET["maHd"]) && isset($_GET["maKh"]) && isset($_GET["maSach"]))
	{
		$maHd=$_GET["maHd"];
		$maKh=$_GET["maKh"];
		$maSach=$_GET["maSach"];
		
		include("../../modules/open.php");
		$sql="insert into tblhoadonchitiet(maHd,maSach,soLuong) values($maHd,$maSach,1)";
		mysqli_query($conn,$sql);
			
		header("Location:../admin.php?dog=3");
		include("../../modules/close.php");
	}
?>