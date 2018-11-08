<h1>Danh sách nhân viên</h1>
 <?php 
		include("../modules/open.php");
		$sql="select * from tblnv";
		$result=mysqli_query($conn,$sql);
		
	?>
    	<table class="table table-responsive">
        	<tr>
            	<td>Mã</td>
                <td>Tài khoản</td>
                <td>Mật khẩu</td>
                <td>Họ và tên</td>
                <td>Ngày sinh</td>
                <td>Giới tính</td>
                <td>Ca làm việc</td>
                <td>Số điện thoại</td>
                <td>Địa chỉ</td>
                <td>Email</td>
                <td></td>
                <td></td>
            </tr>
            <?php
				while($row=mysqli_fetch_array($result))
				{
			?>
            	<tr>
                	<td><?php echo $row["maNv"]?></td>
                    <td><?php echo $row["user"]?></td>
                    <td><?php echo $row["pass"]?></td>
                    <td><?php echo $row["ten"]?></td>
                    <td><?php echo $row["ngaySinh"]?></td>
                    <td>
                     <?php 
                     	if($row["gioiTinh"]==1)
                        {
                        	echo "Nữ";	 
                        }else
                        {
                            echo "Nam";	 
                        }
                            
                    ?>
                    </td>
                    <td><?php echo $row["sdt"]?></td>
                    <td><?php echo $row["diaChi"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><a href="QLNV/editNv.php?maNv=<?php echo $row["maNv"]?>">Sửa</td>
                    <td><a href="QLNV/deleteNvXuLy.php?maNv=<?php echo $row["maNv"]?>" onclick="return confirm('Bạn chắc chắn muốn xóa nhân viên?')">Xóa</td>
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