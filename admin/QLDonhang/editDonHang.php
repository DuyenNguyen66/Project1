<?php
	include("../../modules/open.php");
	
	if(isset($_GET["maHd"]))
	{
		$ma=$_GET["maHd"];
		$sql1="select * from tblhoadon where maHd=$ma";
		$result1=mysqli_query($conn,$sql1);
		$row=mysqli_fetch_array($result1);
		
		if($row["tinhTrang"]==0)
		{
			$sql="update tblhoadon set tinhTrang=1 where maHd=$ma";
		}else if($row["tinhTrang"]==1)
		{
			$sql="update tblhoadon set tinhTrang=2 where maHd=$ma";
		}
		$result=mysqli_query($conn,$sql);
	}	
	include("../../modules/close.php");
	header("Location:../admin.php?dog=3");
?>