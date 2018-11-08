<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>

<body>

<div>
    <img src="images/banner2.jpg" alt="banner" height="221" >
</div>
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
                <li><a href="index.php?dog=2"><span class="glyphicon glyphicon-arrow-left"></span></a></li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">
<?php
include("modules/open.php");
if(isset($_GET["maHd"]))
{		
		$maHd=$_GET["maHd"];
		//
		$sqlHoaDon="select * from tblhoadon where maHd=$maHd";
		$resultHoaDon=mysqli_query($conn,$sqlHoaDon);
		$rowHoaDon=mysqli_fetch_array($resultHoaDon);
		
		//lay hoa don chi tiet
		$sqlHoaDonChiTiet="SELECT * FROM tblhoadonchitiet
										INNER JOIN tblsach ON tblhoadonchitiet.maSach=tblsach.maSach
										WHERE maHd=$maHd";
		$resultHoaDonChiTiet=mysqli_query($conn,$sqlHoaDonChiTiet);
?>
	<h1>Chi tiết đơn hàng</h1>
    <form action="btnCapNhatDonHang.php" method="post">
        <table class="table table-responsive">
            <tr>
                <td>Tên sách</td>
                <td>Giá bìa</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td></td>
            </tr>
	<?php
		$tongTien=0;
        while($rowHoaDonChiTiet=mysqli_fetch_array($resultHoaDonChiTiet))
        {
			$thanhTien=$rowHoaDonChiTiet["gia"]*$rowHoaDonChiTiet["soLuong"];
			$tongTien+=$thanhTien;
	?>
          	<tr>
				<td><?php echo $rowHoaDonChiTiet["tenSach"]?></td>
                <td><?php echo $rowHoaDonChiTiet["gia"]?></td>
        <?php 
			if($rowHoaDon["tinhTrang"]==0)
			{
		?>	  <input type="hidden" name="maHd" value="<?php echo $rowHoaDon["maHd"]?>">
				<input type="hidden" name="maSach" value="<?php echo $rowHoaDonChiTiet["maSach"]?>">
                <td> 
                	<input type="text"  name="soLuong" value=" <?php echo $rowHoaDonChiTiet["soLuong"]?>" />	
                </td>
                <td><?php echo $thanhTien?></td>
                <td>
                	<a href="xoaDonHang.php?maSach=<?php echo $rowHoaDonChiTiet["maSach"]?>&maHd=<?php echo $maHd?>"
                     onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi đơn hàng?')">Xóa</a>
                </td>
        <?php
			}else
			{
		?>
        		<td><?php echo $rowHoaDonChiTiet["soLuong"]?></td>
                <td><?php echo $thanhTien?></td>
                <td></td>
             
        <?php
			}
		} 
		?>
        </tr>
        <tr>
                <td>Tổng tiền</td>
                <td></td>
                <td></td>
                <td><?php echo $tongTien?></td>
                <td></td>
             </tr>
         </table>  
		 <?php
		 	if($rowHoaDon["tinhTrang"]==0)
			{
			?>
		 		<input type="submit" value="Cập nhật" class="btn btn-default">   
			<?php 
			}
			?>
     </form>      
<?php 
}
include("modules/close.php");	
?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>