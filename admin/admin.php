<?php
	include("../modules/open.php");
	session_start();
	if(!isset($_SESSION["user"]))
	{
		header("location:loginAd.php");
	}
?>

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
<nav class="navbar navbar-default ">
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
                <li><a href="?dog=0">Quản lý tài khoản</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý truyện <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?dog=5">Thêm truyện</a></li>
                        <li><a href="?dog=2">Danh sách truyện</a></li>
                        <li><a href="?dog=6">Thêm thể loại</a></li>
                        <li><a href="?dog=7">Danh sách thể loại</a></li>
                    </ul>
                </li>
                <li><a href="?dog=9">Quản lý khách hàng</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý nhân viên <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?dog=8">Thêm nhân viên</a></li>
                        <li><a href="?dog=1">Danh sách</a></li>
                    </ul>
                </li>
                <li><a href="?dog=3">Quản lý đơn hàng</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="?dog=4"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">
    	<?php
        	if(isset($_GET["dog"]))
			{
				switch($_GET["dog"])
				{
					case 0: include("thongtinAd.php");
					break;
					case 1: include("QLNV/listNv.php");
					break;
					case 2: include("QLSach/listSach.php");
					break;
					case 3: include("QLDonHang/listDonHang.php");
					break;
					case 4: include("logoutXuLy.php");
					break;
					case 5: include("QLSach/addSach.php");
					break;
					case 6: include("QLSach/addTheLoai.php");
					break;
					case 7: include("QLSach/listTheLoai.php");
					break;
					case 8: include("QLNV/addNv.php");
					break;
					case 9: include("QLKhachHang/listKh.php");
					break;	
				}
			}else
			{
				include("thongtinAd.php");	
			}
			
		?>
        <?php
?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>
