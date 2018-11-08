<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Trang chủ quản trị</title>
</head>

<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="../admin.php?dog=3"><span class="glyphicon glyphicon-arrow-left"></span></a></li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">  
    <?php 
		include("../../modules/open.php");
		if(isset($_GET["maHd"]) && isset($_GET["maKh"]))
		{
			$maHd=$_GET["maHd"];
			//lay ten sach, gia
			$sql="SELECT *
					FROM tblhoadonchitiet
						INNER JOIN tblsach 
						ON tblhoadonchitiet.maSach=tblsach.maSach 
						where maHd=$maHd";
			$result=mysqli_query($conn,$sql);
			
			//lay maHd, ngay dat hang, tinh trang
			$sqlDonHang="select * from tblhoadon where maHd=$maHd";
			$resultDonHang=mysqli_query($conn,$sqlDonHang);
			$rowDonHang=mysqli_fetch_array($resultDonHang);
			$tinhTrang=$rowDonHang["tinhTrang"];
			
			//lay maKh
			$maKh=$_GET["maKh"];
			$sqlKh="select * from tblkh where maKh=$maKh";
			$resultKh=mysqli_query($conn,$sqlKh);
			$rowKh=mysqli_fetch_array($resultKh);
		}
		
		
	?>
   <h1>Chi tiết đơn hàng</h1>
    	Mã ĐH: <?php echo $rowDonHang["maHd"]?> <br />
        Ngày đặt hàng: <?php echo $rowDonHang["ngayDatHang"]?> <br />
        Tên khách hàng:  <?php echo $rowKh["ten"]?> <br />
        Số điện thoại: <?php echo $rowKh["sdt"]?> <br />
        Địa chỉ: <?php echo $rowKh["diaChi"]?> <br />
        Tình trạng: <?php
						if($tinhTrang == 0)
						{
							echo "Chưa duyệt";	
						}else if($tinhTrang==1)
						{
							echo "Đã duyệt";	
						}else
						{
							echo "Đã giao hàng";	
						}
					?> <br />
    <form action="btnCapNhatDh.php" method="post">
    	<table class="table table-responsive">
        	<tr>
            	<td>Tên sách</td>
                <td>Số lượng</td>
                <td>Đơn giá</td>
                <td>Thành tiền</td>
                <td></td>
            </tr>
	<?php
		$tongTien=0;
		while($row=mysqli_fetch_array($result))
		{
			$thanhTien=$row["soLuong"]*$row["gia"];
			$tongTien+=$thanhTien;
	?>
         	<tr>
				<input type="hidden" name="maHd" value="<?php echo $rowDonHang["maHd"]?>">
				<input type="hidden" name="maSach" value="<?php echo $row["maSach"]?>">
            	<td><?php echo $row["tenSach"]?></td>
			<?php
				if($tinhTrang==1)
				{
			?>
                    <td><input type="text" name="soLuong" value="<?php echo $row["soLuong"]?>"></td>
			<?php
				}else
				{
			?>
                    <td><?php echo $row["soLuong"]?></td>
			<?php
				}
			?>
                <td><?php echo $row["gia"]?></td>
                <td><?php echo $thanhTien?></td>
                <td>
                	<a href="xoaKhoiDonHang.php?maSach=<?php echo $row["maSach"]?>&maHd=<?php echo $rowDonHang["maHd"]?>" onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi đơn hàng?')" >Xóa</a>
                </td>
            </tr>
	<?php
		}
	?>
    		<tr>
            	<td>Tổng tiền</td>
                <td></td>
                <td></td>
                <td><?php echo $tongTien?></td>
                <td></td>
            </tr>
        </table>
    <?php
    	if($tinhTrang==1)
		{
			?>
			<input type="submit" value="Cập nhật" class="btn btn-default"><br>
            <a class="btn btn-success" href="search.php?maHd=<?php echo $rowDonHang["maHd"]?>&maKh=<?php echo $rowKh["maKh"]?>">Thêm sách</a>
            <?php
		}
	?>
	</form>
	<?php	
		include("../../modules/close.php");
	?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html