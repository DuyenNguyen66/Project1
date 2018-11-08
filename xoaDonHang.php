<?php
	include("modules/open.php");
	if(isset($_GET["maHd"]) && isset($_GET["maSach"]))
	{	
		$maHd=$_GET["maHd"];
		$maSach=$_GET["maSach"];
		$sqlHd="select * from tblhoadonchitiet where maHd=$maHd  and maSach=$maSach" ;
		$resultHd=mysqli_query($conn,$sqlHd);
		$rowSach=mysqli_num_rows($resultHd);
		
		if($rowSach==1)
		{
			$sql="delete from tblhoadon where maHd=$maHd";
			mysqli_query($conn,$sql);
			$sqlSach="delete from tblhoadonchitiet where maHd=$maHd  and maSach=$maSach" ;
			mysqli_query($conn,$sqlSach);
			
			header("Location:index.php?dog=2");	
		}else
		{	
			$sqlSach="delete from tblhoadonchitiet where maHd=$maHd  and maSach=$maSach" ;
			mysqli_query($conn,$sqlSach);
					
			header("Location:index.php?dog=2");	
		}
	}
	include("modules/close.php");
?>