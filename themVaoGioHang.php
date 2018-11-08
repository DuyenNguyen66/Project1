<?php
	session_start();
	if(isset($_SESSION["userKh"]))
	{	
		if(isset($_GET["maSach"]))
		{	
			$maSach=$_GET["maSach"];
			if(isset($_SESSION["gioHang"])) //nếu có giỏ hàng
			{
				if(isset($_SESSION["gioHang"][$maSach])) //giỏ hàng đã có sách	
				{
					$_SESSION["gioHang"][$maSach]++;	
				}else
				{ //giỏ chưa có sách này
					$_SESSION["gioHang"][$maSach]=1;	
				}
			}else 
			{ //nếu chưa có giỏ hàng
				$_SESSION["gioHang"]=array();
				$_SESSION["gioHang"][$maSach]=1;
			}
			header("Location:index.php?dog=0");	
		}else
		{
			header("Location:index.php?dog=0");	
		}
	}else
	{
		header("location:index.php?dog=4");	
	}
?>