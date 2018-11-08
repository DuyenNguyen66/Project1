<?php 
	session_start();
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		
		include("../modules/open.php");
		
		$sql="select * from tbladmin where user='$user' and pass='$pass'";
		$result=mysqli_query($conn,$sql);
		
		$row=mysqli_num_rows($result);
		if($row==0)
		{
			header("location:loginAd.php");	
		}else
		{
			$_SESSION["user"]=$user;
			$_SESSION["pass"]=$pass;
			header("location:admin.php");		
		}
		include("../modules/close.php");	
?>