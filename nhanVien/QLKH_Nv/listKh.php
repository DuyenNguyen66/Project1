<h1>Danh sách thành viên</h1>
 <?php 
		include("../modules/open.php");
		$sql="select * from tblkh";
		$result=mysqli_query($conn,$sql);
		
	?>
    	<table class="table table-responsive">
        	<tr>
            	<td>Mã</td>
                <td>Tài khoản</td>
                <td>Mật khẩu</td>
                <td>Họ và tên</td>
                <td>Số điện thoại</td>
                <td>Địa chỉ</td>
                <td></td>
                <td></td>
            </tr>
            <?php
				while($row=mysqli_fetch_array($result))
				{
			?>
            	<tr>
                	<td><?php echo $row["maKh"]?></td>
                    <td><?php echo $row["user"]?></td>
                    <td><?php echo $row["pass"]?></td>
                    <td><?php echo $row["ten"]?></td>
                    <td><?php echo $row["sdt"]?></td>
                    <td><?php echo $row["diaChi"]?></td>
                    <td><a href="QLKH_Nv/editKh.php?maKh=<?php echo $row["maKh"]?>">Sửa</td>
                    <td><a href="QLKH_Nv/deleteKh.php?maKh=<?php echo $row["maKh"]?>" onclick="return confirm('Bạn chắc chắn muốn xóa thành viên?')">Xóa</td>
            	</tr>   
          <?php	
				}
		  ?>
        </table>
        <?php 
			include("../modules/close.php");
		?>
</body>
</html>