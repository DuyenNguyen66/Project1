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
                <li><a href="../index.php?dog=4"><span class="glyphicon glyphicon-arrow-left"></span></a></li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">
<h1>Tìm kiếm tài khoản</h1>
	<form method="get" class="navbar-form form-horizontal">
        <label class="control-label col-sm-4">Số điện thoại:</label>
        <div class="col-sm-4">
             <input type="number" class="form-control" name="txtNum" value="<?php if(isset($_GET["txtNum"])){echo $_GET["txtNum"];}?>">
             <input type="submit" class="btn btn-info" value="Search" onclick="return addKhVal()">
        </div>   
    </form>
    <br><br>
    <?php
		include("../modules/open.php");

		if(isset($_GET["txtNum"]))
		{
			$search=$_GET["txtNum"];
			$sql="select * from tblkh where sdt like '$search'";
			$result=mysqli_query($conn,$sql);
		
			if(mysqli_num_rows($result)==0)
			{
				echo "Không tìm thấy tài khoản.";	
			}
			$row=mysqli_fetch_array($result);
				?>
                <strong>Tài khoản tìm thấy</strong>
                <table class="table table-responsive">
                    <tr>
                        <td>Tài khoản</td>
                        <td>Mật khẩu</td>
                        <td>Họ và tên</td>
                        <td>Số điện thoại</td>
                    </tr>
                    <tr>
                        <td><?php echo $row["user"]?></td>
                        <td><?php echo $row["pass"]?></td>
                        <td><?php echo $row["ten"]?></td>
                        <td><?php echo $row["sdt"]?></td>
                    </tr>
                </table>
    			<?php
		}
		
	?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>