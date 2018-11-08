<?php
	include("../modules/open.php");
	session_start();
	if(!isset($_SESSION["userNv"]))
	{
		header("location:loginNv.php");
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
<title>Trang chủ nhân viên</title>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quản lý thành viên<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?dog=1">Danh sách thành viên</a></li>
                    </ul>
                </li>
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
					case 0: include("thongtinNv.php");
					break;
					case 1: include("QLKH_Nv/listKh.php");
					break;
					case 2: include("QLSach_Nv/listSach.php");
					break;
					case 4: include("logoutNv.php");
					break;
					case 5: include("QLSach_Nv/addSach.php");
					break;
					case 6: include("QLSach_Nv/addTheLoai.php");
					break;
					case 7: include("QLSach_Nv/listTheLoai.php");
					break;	
				}
			}else
			{
				include("thongtinNv.php");	
			}
			
		?>
        <?php
?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>
