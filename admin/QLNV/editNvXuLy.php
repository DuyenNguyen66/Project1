<?php 
if(isset($_POST["txtMa"]) && isset($_POST["txtUser"]) && isset($_POST["txtPass"]) && isset($_POST["txtName"]) && isset($_POST["txtNgay"]) && isset($_POST["rdbGioiTinh"]) && isset($_POST["txtNum"]) && isset($_POST["txtAdd"]) && isset($_POST["txtEmail"]))
{
	$ma=$_POST["txtMa"];
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	$name=$_POST["txtName"];
	$ngaySinh=$_POST["txtNgay"];
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
	
	include('../../modules/open.php');
	
	$sql="update tblnv set user='$user', pass='$pass',ten='$name',ngaySinh='$ngaySinh', gioiTinh=$gioiTinh,sdt=$num,diaChi='$add',email='$email' where tblnv.maNv=$ma";
	mysqli_query($conn,$sql);
	
	include('../../modules/close.php');
	header('location:../admin.php?dog=1');
}
?>