<?php 
	session_start();
	if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]))
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
	
		include("../modules/open.php");
		
		$sql="select * from tblkh where user='$user' and pass='$pass'";
		$result=mysqli_query($conn,$sql);
		$num_row=mysqli_num_rows($result);
		if($num_row==0)
		{
			header("location:../index.php?dog=4");	
		}else
		{
			$_SESSION["userKh"]=$user;
			$_SESSION["passKh"]=$pass;
			header("location:../index.php?dog=0");		
		}
		include("../modules/close.php");
	}else
	{
		header("Location:index.php?dog=4");	
	}

?>