<?php
	session_start();
	
	include("modules/open.php");
	//lấy mã hóa đơn (lấy max Mã hđ về,nếu max Mã hđ mà >0, thì hđ mới=max Mã hđ +1, nếu chưa có hđ nào, mã hđ tăng từ 0)
	$sqlMaxMaHd="select max(maHd) as maxMa from tblhoadon ";
	$resultMaxMaHd=mysqli_query($conn,$sqlMaxMaHd);
	$rowMaxMaHd=mysqli_fetch_array($resultMaxMaHd);
	$maxMa=$rowMaxMaHd["maxMa"];
	$maHd=0;
	if($maxMa!='NULL')
	{
		$maHd=$maxMa+1;	
	}
	
	//lấy mã khach hàng, insert vào tbl Hóa đơn
	if(isset($_SESSION["userKh"]))
	{
		$user=$_SESSION["userKh"];
		$sqlKh="select * from tblkh where user='$user'";
		$resultKh=mysqli_query($conn,$sqlKh);
		$rowKh=mysqli_fetch_array($resultKh);
		$maKh=$rowKh["maKh"];
		
		$sqlhd="insert into tblhoadon values ($maHd,$maKh,now(),0)";
		mysqli_query($conn,$sqlhd);
		
	}
	
	//insert vao tbl hoa don chi tiet, xóa giỏ hàng đã xuất hóa đơn
	if(isset($_SESSION["gioHang"]))
	{
		$gioHang=$_SESSION["gioHang"];
		foreach($gioHang as $maSach=>$soLuong)	
		{
			$sql="insert into tblhoadonchitiet values ($maHd,$maSach,$soLuong)";
			mysqli_query($conn,$sql);	
		}
		unset($_SESSION["gioHang"]);
		header("Location:index.php?dog=3");
	}	
	include("modules/close.php");
	
?>