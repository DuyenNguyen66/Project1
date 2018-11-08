<?php
	include('modules/open.php');
	if(isset($_SESSION["userKh"]))
	{
		$userKh=$_SESSION["userKh"];
		$sql="select * from tblkh where user='$userKh'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);	
			
?>
<h1>Thông tin tài khoản</h1>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8 col-xs-12">
        <table class="table table-responsive">
        	<tr>
				<td>Tài khoản: </td>
				<td><?php echo $row["user"]?> </td>
            </tr>
            <tr>
            	<td>Mật khẩu: </td>
				<td><?php echo $row["pass"]?></td>
            </tr>   
            <tr>
                <td>Họ và tên: </td>
				<td><?php echo $row["ten"]?></td>
            </tr>
            <tr>
            	<td>Số điện thoại: </td>
				<td><?php echo $row["sdt"]?> </td>
            </tr>
            <tr>
            	<td>Địa chỉ: </td>
				<td><?php echo $row["diaChi"]?></td>
            </tr>
            <tr>
                 <td colspan="2" align="center">
                 	<a class="btn btn-info" href="khachHang/editKh.php?maKh=<?php echo $row["maKh"]?>">Sửa thông tin</a>
                 </td>
            </tr>
        </table>
    </div>
</div>
<?php
	}
     include('modules/close.php');
?>
