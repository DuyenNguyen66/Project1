      	<?php
			include('../modules/open.php');
			$sql="select * from tbladmin";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);
			
		?>
<h1>Thông tin tài khoản</h1>
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
            	<td>Ngày sinh: </td>
				<td><?php echo $row["ngaySinh"]?> </td>
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
                 	<a class="btn btn-info" href="editAd.php?maAd=<?php echo $row["maAd"]?>">Sửa thông tin</a>
                 </td>
            </tr>
        </table>
</div>
        <?php
            include('../modules/close.php');
		?>
