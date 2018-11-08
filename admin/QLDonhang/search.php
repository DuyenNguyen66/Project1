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
<?php
	if(isset($_GET["maHd"]) && isset($_GET["maKh"]))
	{
		$maHd=$_GET["maHd"];
		$maKh=$_GET["maKh"];	
		include("../../modules/open.php");
		
		$sql="select * from tblhoadon where maHd=$maHd ";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$sqlKh="select * from tblkh where maKh=$maKh ";
		$resultKh=mysqli_query($conn,$sqlKh);
		$rowKh=mysqli_fetch_array($resultKh);
	}
?>
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
                <li><a href="chiTietDonHang.php?maHd=<?php echo $row["maHd"]?>&maKh=<?php echo $rowKh["maKh"]?>">
                	<span class="glyphicon glyphicon-arrow-left"></span></a>
                </li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">  

<h1>Tìm kiếm</h1>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form method="get" class="navbar-form">
            	<input type="hidden" name="maHd" value="<?php echo $row["maHd"]?>">
                <input type="hidden" name="maKh" value="<?php echo $rowKh["maKh"]?>">
                <input type="text" name="txtSearch" class="form-control" value="<?php if(isset($_GET["txtSearch"])){echo $_GET["txtSearch"];}?>"/>
                <button type="submit" class="form-control"><span class="glyphicon glyphicon-search"></span> Search</button>
            </form>
        </div>
    </div>
	<div class="row" style="padding:50px">
    	<div class="col-sm-4"></div>
        <div class="col-sm-4">
		<?php
		//Tim kiem
		$search="";
		if(isset($_GET["txtSearch"]))
		{
			$search=$_GET["txtSearch"];	
			$sqlSach="select * from tblsach where tenSach like '%$search%'";
			$resultSach=mysqli_query($conn,$sqlSach);
			if(mysqli_num_rows($resultSach)==0)
			{
				echo "Không tìm thấy sản phẩm nào.";	
			}
			$rowSach=mysqli_fetch_array($resultSach);
		?>
            <table style="width:200px">
                <tr>
                    <td>
                         <img src="../../<?php echo $rowSach["anh"]?>" height="200px">
                    </td>
                </tr>
                <tr>
                    <td>
                         <?php echo $rowSach["tenSach"]?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $rowSach["gia"]?></td> 
                </tr>
       		</table>
            <a href="addChiTietDonHang.php?maHd=<?php echo $row["maHd"]?>&maKh=<?php echo $row["maKh"]?>&maSach=<?php echo $rowSach["maSach"]?>" class="btn btn-success">
            	Thêm vào hóa đơn</a>
	<?php
					
		}	
		?>
    	</div>
    </div>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>
