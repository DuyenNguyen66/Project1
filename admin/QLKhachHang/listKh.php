<div class="row">
	<h1>Tìm kiếm</h1>
</div>
<div class="row">
	<div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form method="get" class="navbar-form">
             <input type="hidden" name="dog" value="9" />
             <input type="search" name="txtSearch" value="<?php if(isset($_GET["txtSearch"])){echo $_GET["txtSearch"];}?>" placeholder="Tên, số điện thoại, địa chỉ..." class="form-control">
             <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
        </form>
    </div>
</div>
<h1>Danh sách khách hàng</h1>
 <?php 
		include("../modules/open.php");
		$sql="select * from tblkh";
		
		$search="";
		if(isset($_GET["txtSearch"]))
		{
			$search=$_GET["txtSearch"];
			$sql="select * from tblkh where ten like '%$search%' or sdt like '%$search%' or diaChi like '%$search%'";
		}
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
		{
			echo "Không tìm thấy khách hàng nào";	
		}
		
		//phan trang
		$start=0;
		$soKhTren1Trang=5;
		if(isset($_GET["page"]))
		{
			$page=$_GET["page"];
			$start=$page*$soKhTren1Trang;	
		}
		$end=$soKhTren1Trang;
		$soKh=mysqli_num_rows($result);
		$soTrang=ceil($soKh/$soKhTren1Trang);
		
		//loc
		$sql="select * from tblkh where ten like '%$search%' or sdt like '%$search%' or diaChi like '%$search%' limit $start,$end";	
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
                    <td><a href="QLKhachHang/editKh.php?maKh=<?php echo $row["maKh"]?>">Sửa</td>
                    <td><a href="QLKhachHang/deleteKh.php?maKh=<?php echo $row["maKh"]?>" onclick="return confirm('Bạn chắc chắn muốn xóa thành viên?')">Xóa</td>
            	</tr>   
          <?php	
				}
		  ?>
        </table>
    <ul class="pagination">
    <?php 
		for($i=0;$i<$soTrang;$i++)
		{
			?>
    		<li><a href="?dog=9&page=<?php echo $i?>"><?php echo ($i+1) ?></a></li>
            <?php
		}
	?>
    </ul>
        <?php 
			include("../modules/close.php");
		?>
</body>
</html>