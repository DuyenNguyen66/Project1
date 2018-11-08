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

<div >
	<img src="images/banner2.jpg" alt="banner" height="221">
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
                <li><a href="index.php?dog=0"><span class="glyphicon glyphicon-arrow-left"></span></a></li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">
<?php
	include("modules/open.php");
	if(isset($_GET["maSach"]))
	{
		$ma=$_GET["maSach"];	
		$sql="select * from tblsach 
						inner join tbltheloai on tblsach.maTl=tbltheloai.maTl 
						where maSach=$ma";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
	}
?>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-4 col-xs-12">
    	<img src="<?php echo $row["anh"]?>" class="img-responsive">	
	</div>
    <div class="col-sm-6">
    	<table class="table table-responsive">
			<tr>
                <th colspan="2" style="font-size:24px"><?php echo $row["tenSach"]?></th>
            </tr>
            <tr>
                <td>Tác giả:</td>
                <td><?php echo $row["tenTg"]?></td>
            </tr>
            <tr>
                <td>Thể loại:</td>
            	<td><?php echo $row["tenTl"]?></td>
            </tr>
            <tr>
                <td>Giá: </td>
				<td><?php echo $row["gia"]?></td>
            </tr>
            <tr>
            	<td colspan="2">
                	<fieldset>
                    	<legend>Mô Tả</legend>
                        <?php echo $row["moTa"]?>
                    </fieldset>
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="center">
                   <a class="btn btn-success" href="themVaoGioHang.php?maSach=<?php echo $row["maSach"]?>">Thêm vào giỏ hàng</a>
                </td>
            </tr>        	
        </table>
    </div>
</div><!--row-->
<?php
	include("modules/close.php")	
?>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>