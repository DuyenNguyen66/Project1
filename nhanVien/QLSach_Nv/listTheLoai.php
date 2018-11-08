
<?php
	include("../modules/open.php");
	$sql="select * from tbltheloai";
	$result=mysqli_query($conn,$sql);
	
?>
	<h1>Danh sách thể loại</h1>
        <table class="table table-responsive">	
            <tr>
                <td>Mã thể loại</td>
                <td>Thể loại</td>
                <td></td>
            </tr>
            <?php
                while($row=mysqli_fetch_array($result))
                {
            ?>
            <tr>
                <td><?php echo $row["maTl"]?></td>
                <td><?php echo $row["tenTl"]?></td>
                <td><a href="QLSach_Nv/deleteTheLoai.php?maTl=<?php echo $row["maTl"]?>" onclick="return confirm('Bạn chắc chắn muốn xóa thể loại này?')">Xóa</td>
            </tr>
            <?php
                }
            ?>
        </table>
         <?php 
			include("../modules/close.php");
		?>