<?php
if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]) && isset($_POST["txtName"]) && isset($_POST["txtNum"]) && isset($_POST["txtAdd"]))
{
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	$name=$_POST["txtName"];
	$num=$_POST["txtNum"];
	$add=$_POST["txtAdd"];
	
	include("../modules/open.php");
	
	$sql="insert into tblkh (user, pass, ten, sdt, diaChi) values ('$user','$pass','$name','$num','$add')";
	mysqli_query($conn,$sql);
	
	include("../modules/close.php");
	header("location:../index.php?dog=4");
}
?>