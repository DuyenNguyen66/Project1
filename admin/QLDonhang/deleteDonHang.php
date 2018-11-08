<?php
	include("../../modules/open.php");
	if(isset($_GET["maHd"]))
	{
		$maHd=$_GET["maHd"];
		//xóa ở tbl hóa đơn chi tiết
		$sqlHdChiTiet="delete from tblhoadonchitiet where maHd=$maHd";
		mysqli_query($conn,$sqlHdChiTiet);
		
		//xóa ở tbl hóa đơn
		$sqlHd="delete from tblhoadon where maHd=$maHd";
		mysqli_query($conn,$sqlHd);
	}
	include("../../modules/close.php");
	header("Location:../admin.php?dog=3");
?>