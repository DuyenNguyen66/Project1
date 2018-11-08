<form method="get" class="navbar-form navbar-right">
	<input type="hidden" name="dog" value="2" />
	<input type="text" name="txtSearch" placeholder="Tên tác phẩm, tác giả, thể loại..." class="form-control" value="<?php if(isset($_GET["txtSearch"])){echo $_GET["txtSearch"];}?>"/>
    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
</form>

    <?php 
		$sql="select * from (tblsach inner join tbltheloai on tblsach.maTl=tbltheloai.maTl) order by maSach asc";

		//Tim kiem
		$search="";
		if(isset($_GET["txtSearch"]))
		{
			$search=$_GET["txtSearch"];
			$sql="select * from (tblsach 
							inner join tbltheloai on tblsach.maTl=tbltheloai.maTl)
							where tenSach like '%$search%' or tenTg like '%$search%' or tenTl like '%$search%' 
							order by maSach asc";	
		}
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
		{
			echo "Không tìm thấy sản phẩm nào.";	
		}
		
		//Phan trang
		$start=0;
		$soSachTren1Trang=6;
		$end=$soSachTren1Trang;	
		if(isset($_GET["page"]))
		{
			$page=$_GET["page"];
			$start=$page*$soSachTren1Trang;		
		}
		$soSach=mysqli_num_rows($result); 
		$soTrang=ceil($soSach/$soSachTren1Trang); 
		
		//loc san pham
		$sql="select * from (tblsach inner join tbltheloai on tblsach.maTl=tbltheloai.maTl)
							 where tenSach like '%$search%' or tenTg like '%$search%' or tenTl like '%$search%' 
							 order by maSach asc
							 limit $start,$end";
		$result=mysqli_query($conn,$sql);
		
	?>
    <h1>Danh sách truyện</h1>
    	<table class="table table-responsive">
        	<tr align="center">
            	<td>Mã sách</td>
                <td>Ảnh bìa</td>
                <td>Tên sách</td>
                <td>Mô tả</td>
                <td>Tác giả</td>
                <td>Thể loại</td>
                <td>Giá bìa</td>
                <td>Ngày nhập hàng</td>
                <td></td>
                <td></td>
            </tr>
            <?php
				while($row=mysqli_fetch_array($result))
				{
			?>
            	<tr>
                	<td><?php echo $row["maSach"]?></td>
                    <td><img src="../<?php echo $row["anh"]?>" height="80px" /></td>
                    <td><?php echo $row["tenSach"]?></td>
                    <td><textarea class="form-control"><?php echo $row["moTa"]?></textarea></td>
                    <td><?php echo $row["tenTg"]?></td>
                    <td><?php echo $row["tenTl"]?></td>
                    <td><?php echo $row["gia"]?></td>
                    <td><?php echo $row["ngayNhap"]?></td>
                    <td><a href="QLSach/editSach.php?maSach=<?php echo $row["maSach"]?>">Sửa</td>
                    <td><a href="QLSach/deleteSachXuLy.php?maSach=<?php echo $row["maSach"]?>" onclick="return confirm('Bạn chắc chắn muốn xóa sách này?')">Xóa</td>
            	</tr>   
          <?php	
				}
		  ?>
        </table>
		<ul class="pagination" >
		<?php
            for($i=0;$i<$soTrang;$i++)
            {
                if(isset($_GET["txtSearch"]))
                {
                    $search=$_GET["txtSearch"];
                    ?>
                    <li><a href="?dog=2&page=<?php echo $i?>&txtSearch=<?php echo $search?>"><?php echo ($i+1) ?></a></li>
                    <?php
                }else
                {
        ?>
                    <li><a href="?dog=2&page=<?php echo $i?>"><?php echo ($i+1) ?></a></li>
        <?php
                }
            }
			include("../modules/close.php");
        ?>
            </ul>
