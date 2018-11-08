<?php
		$theLoai=$_POST["txtTl"];
		
		include("../../modules/open.php");
		$sql="insert into tbltheloai(tenTl) values ('$theLoai')";
		mysqli_query($conn,$sql);
		
		include("../../modules/close.php");
		header("Location:../nhanVien.php?dog=7");	
?>