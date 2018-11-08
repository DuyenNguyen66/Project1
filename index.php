<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Trang chủ</title>
</head>

<body>
<?php
	include("modules/open.php");
	$sql="select * from tbltheloai";
	$result=mysqli_query($conn,$sql);
?>
<div>
    <img src="images/banner2.jpg" alt="banner" height=221" >
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
                <li><a href="?dog=0">Trang chủ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thể loại <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <?php
						while($row=mysqli_fetch_array($result))
						{
					?>
                        <li><a href="?dog=1&maTl=<?php echo $row["maTl"]?>"><?php echo $row["tenTl"]?></a></li>
                    <?php
						}
						include("modules/close.php");
					?>
                    </ul>
                </li>
                <li><a href="?dog=3">Giỏ hàng</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
				if(isset($_SESSION["userKh"]))
				{
			?>
            	<li><a href="?dog=2">Lịch sử đơn hàng</a></li>
                <li><a href="?dog=6"><span class="glyphicon glyphicon-user"></span> Tài khoản</a></li>
            	<li><a href="?dog=5"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
            	
            <?php
				}else
				{
			?>
            	<li><a href="?dog=4"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
                <li><a href="?dog=7"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
            <?php
				}
			?>
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
				case 0: include("listSp.php");break;
				case 1: include("listSpTheLoai.php");break;	
				case 2: include("lichSuDonHang.php");break;		
				case 3: include("xemGioHang.php");break;					
				case 4: include("khachHang/loginKh.php");break;
				case 5: include("khachHang/logoutKh.php");break;	
				case 6: include("khachHang/thongTinKh.php");break;
				case 7: include("khachHang/dangKy.php");break;
			}	
		}else
		{
			include("listSp.php");
		}
	  ?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>