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
<script>	
	function editSachVal()
	{
		var dem=0;
		
		//ten
		var ten=document.getElementById("txtTen").value;
		var errTen=document.getElementById("errTen");
		if(ten.length==0)
		{
			errTen.innerHTML="Không được để trống!";
		}else
		{
			errTen.innerHTML="";	
			dem++;
		}
		
		//mota
		var moTa=document.getElementById("txtMoTa").value;
		var errMoTa=document.getElementById("errMoTa");
		if(moTa.length==0)
		{
			errMoTa.innerHTML="Không được để trống!";	
		}else
		{
			errMoTa.innerHTML="";
			dem++;	
		}
		
		//tacgia
		var tacgia=document.getElementById("txtTacGia").value;
		var errTacGia=document.getElementById("errTacGia");
		if(tacgia.length==0)
		{
			errTacGia.innerHTML="Không được để trống!";
		}else
		{
			errTacGia.innerHTML="";	
			dem++;
		}
		
		//theloai
		var theloai=document.getElementById("btntheLoai").value;
		var errTheLoai=document.getElementById("errTheLoai");
		if(theloai==0)
		{
			errTheLoai.innerHTML="Hãy chọn thể loại!";
		}else
		{
			errTheLoai.innerHTML="";	
			dem++;
		}
		
		//gia
		var gia=document.getElementById("txtGia").value;
		var errGia=document.getElementById("errGia");
		if(gia==0)
		{
			errGia.innerHTML="Không được để trống!";
		}else
		{
			errGia.innerHTML="";	
			dem++;
		}
				
		if(dem==5)
		{
			return true;	
		}else
		{
			return false;	
		}
	}
	
</script>

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
                <li><a href="../admin.php?dog=2"><span class="glyphicon glyphicon-arrow-left"></span></a></li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">
    	<?php
        	include("../../modules/open.php");
			$ma=$_GET["maSach"];
			
			$sql="select * from tblsach where maSach=$ma";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);
			
			$sqlTheLoai="select * from tbltheloai";
			$resultTheLoai=mysqli_query($conn,$sqlTheLoai);
			
		?>
<h1>Sửa thông tin sách</h1>
    	<form action="editSachXuLy.php" class="form-horizontal" method="post" >
        	<div class="form-group">
            	<label class="control-label col-sm-4">Mã sách:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtMa" name="txtMa" readonly="readonly" value="<?php echo $row["maSach"]?>">
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Tên sách:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtTen" name="txtTen" value="<?php echo $row["tenSach"]?>"> <span id="errTen"> </span>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Mô tả:</label>
                <div class="col-sm-4">
                	<textarea class="form-control" id="txtMoTa" name="txtMoTa" ><?php echo $row["moTa"]?></textarea> <span id="errMoTa"></span>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Tác giả:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtTacGia" name="txtTacGia" value="<?php echo $row["tenTg"]?>"> <span id="errTacGia"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Thể loại: </label>
                <div class="col-sm-4">
                    <select id="btntheLoai" name="btntheLoai" class="form-control">
                        <option value="0">--Chọn thể loại--</option>
                        <?php
                            while($rowTheLoai=mysqli_fetch_array($resultTheLoai))
                            {
                        ?>
                        <option value="<?php echo $rowTheLoai["maTl"]?>"> 
                        <?php 
                            echo $rowTheLoai["tenTl"];	
                        ?>
                        </option>
                        <?php
                        }
                        ?>             
                    </select> <span id="errTheLoai"></span>
                </div>
    		</div>
            <div class="form-group">
                <label class="control-label col-sm-4">Giá bìa: </label>
                <div class="col-sm-4">
                    <input type="number" id="txtGia" name="txtGia" class="form-control" value="<?php echo $row["gia"]?>"> <span id="errGia"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Ngày nhập hàng: </label>
                <div class="col-sm-4">
                    <input type="date" name="txtNgay" class="form-control" value="<?php echo $row["ngayNhap"]?>">
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-4">
                	<input type="submit" class="btn btn-success" value="Sửa thông tin" onclick="return editSachVal()">
                    <input type="reset" class="btn btn-default" value="Nhập lại" onclick="return confirm('Chắc chắn muốn nhập lại?')">
                </div>
            </div>          
        </form>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>