<?php
	if(isset($_POST["txtMa"]) && isset($_POST["txtTen"]) && isset($_POST["txtMoTa"]) && isset($_POST["txtTacGia"]) && isset($_POST["btntheLoai"]) && isset($_POST["txtGia"]) && isset($_POST["txtNgay"]))
	{
		$ma=$_POST["txtMa"];
		$ten=$_POST["txtTen"];
		$moTa=$_POST["txtMoTa"];
		$tacgia=$_POST["txtTacGia"];
		$theLoai=$_POST["btntheLoai"];
		$gia=$_POST["txtGia"];
		$ngayNhap=$_POST["txtNgay"];
		
		include("../../modules/open.php");
		
		$sql="update tblsach set tenSach='$ten', maTl='$theLoai', tenTg='$tacgia',tenSach='$ten',moTa='$moTa',gia=$gia,ngayNhap='$ngayNhap' where maSach=$ma";
		mysqli_query($conn,$sql);
		
		include("../../modules/close.php");
		header("Location:../admin.php?dog=2");
	}
?>