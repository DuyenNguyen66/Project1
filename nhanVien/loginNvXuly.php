<?php
	session_start();
	
	$user=$_POST["txtUser"];
	$pass=$_POST["txtPass"];
	
	include("../modules/open.php");
	
	$sql="select * from tblnv where user='$user' and pass='$pass'";
	$result_mem=mysqli_query($conn,$sql);
	$member=mysqli_fetch_array($result_mem);
	
	$result=mysqli_query($conn,$sql);
	$num_row=mysqli_num_rows($result);
	if($num_row==0)
	{
		header("location:loginNv.php");	
	}else
	{
		$_SESSION["userNv"]=$user;
		$_SESSION["passnv"]=$pass;
		$_SESSION["maNv"]=$member["maNv"];
		header("location:nhanVien.php");
	}
	include("../modules/close.php");
?>