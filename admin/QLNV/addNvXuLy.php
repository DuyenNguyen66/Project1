<?php
if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]) && isset($_POST["txtName"]) && isset($_POST["txtNgaySinh"]) && isset($_POST["rdbGioiTinh"]) && isset($_POST["txtNum"]) && isset($_POST["txtAdd"]) && isset($_POST["txtEmail"]))
{
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	$name=$_POST["txtName"];
	$ngaySinh=$_POST["txtNgaySinh"];
	if($_POST["rdbGioiTinh"]=="Nam")
	{
		$gioiTinh=0;	
	}else
	{
		$gioiTinh=1;		
	}
	$num=$_POST["txtNum"];
	$add=$_POST["txtAdd"];
	$email=$_POST["txtEmail"];
	
	include("../../modules/open.php");
	
	$sql="insert into tblnv (user, pass, ten, ngaySinh, gioiTinh, sdt, diaChi, email) values ('$user','$pass','$name','$ngaySinh','$gioiTinh','$num','$add','$email')";
	mysqli_query($conn,$sql);
	
	include("../../modules/close.php");
	header('location:../admin.php?dog=1');
}else
{
	header('location:addNv.php');	
}
?>