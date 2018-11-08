<?php 
if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]) && isset($_POST["txtName"]) && isset($_POST["txtNgaySinh"]) && isset($_POST["txtNum"]) && isset($_POST["txtAdd"]))
{
	$ten=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	$name=$_POST["txtName"];
	$ngaySinh=$_POST["txtNgaySinh"];
	$num=$_POST["txtNum"];
	$add=$_POST["txtAdd"];
	
	include('../modules/open.php');
	
	$sql="update tbladmin set pass='$pass',ten='$name',ngaySinh='$ngaySinh',sdt=$num,diaChi='$add'";
	mysqli_query($conn,$sql);
	
	include('../modules/close.php');
	header('location:admin.php?dog=0');
}
?>