<?php 
	if(!isset($_SESSION["userKh"]))
	{
?>
		<br />
		Bạn phải đăng nhập để thêm vào giỏ hàng.
		<a href="index.php?dog=4" style="color:#F00">Đăng nhập</a>
<?php		
	}else
	{
		echo "Welcom,".$_SESSION["userKh"];
		include("modules/open.php"); 	
		if(isset($_SESSION["gioHang"]))
		{
			$gioHang=$_SESSION["gioHang"];
?>
<h1>Giỏ hàng</h1>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8 col-xs-12">
            <form action="btnCapNhat.php" method="post">
                <table class="table table-responsive">
                    <tr>
                        <td>Tên sách</td>
                        <td>Ảnh</td>
                        <td>Giá bìa</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                        <td></td>
                    </tr>
                    <?php 
                        $tongTien=0;
                        foreach($gioHang as $maSach=>$soLuong) //loop through keys and values
                        {
                            $thanhTien=0;
                            $sql="select * from tblsach where maSach=$maSach";
                            $result=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_array($result);
                            $thanhTien=$row["gia"]*$soLuong;
                            $tongTien+=$thanhTien;
                    ?>	
                            <tr>
                                <td><?php echo $row["tenSach"]?></td>
                                <td><img src="<?php echo $row["anh"]?>" height="100px"></td>
                                <td><?php echo $row["gia"]?></td>
                                <td><input type="text" value="<?php echo $soLuong?>" name="arrSl[]" width="50px"></td>
                                <td><?php echo $thanhTien ?></td>
                                <td><a href="xoaKhoiGioHang.php?maSach=<?php echo $row["maSach"]?>" onclick="return confirm('Bạn có muốn xóa sách khỏi giỏ hàng?')">Xóa</a></td>
                            </tr>
                    
                    <?php		
                        }
                    ?>
                    <tr>
                    	<td colspan="4">Tổng tiền</td>
                        <td colspan="2"><?php echo $tongTien ?> </td>
                    </tr>	
                </table>
                <input type="submit" class="btn btn-default" value="Cập nhật giỏ hàng">
            </form>
    </div><!--col-sm-8-->
    <div class="col-sm-2"></div>
</div><!--row-->
<div class="row">
	<div class="col-sm-2"></div>
    <div class="col-sm-10 col-xs-12">
    	<a href="datHang.php" class="btn btn-success">Đặt hàng</a>
    </div>
    <div class="col-sm-2"></div>    
</div>
	<?php 	
        }else
        {
            echo "<br>"."Bạn chưa chọn sản phẩm nào!"."<br>";
    ?>
    
    	<div align="center">
           	<a href="index.php?dog=0" class="btn btn-default">Tiếp tục mua sắm</a>
        </div>
    <?php	
        }
		include("modules/close.php");
	}
	?>
	
